<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *
     * @var $users
     */
    protected $name;
    protected $model;
    public $_page_num = 20;

    /**
     *
     * @return void
     */
    public function __construct()
    {
        $route = Route::currentRouteName();
        if (!empty($route)) {
            $this->name = explode(".", $route)[0];

            $modelName = ucfirst(explode(".", $route)[0]);
            if ($modelName == 'companies') {
                $modelName = 'company';
            }
//            $model = 'App\\Models\\'.ucfirst(explode(".", $route)[1]);
            $model = 'App\\Models\\'.$modelName;
            $this->model = new $model();
        }
    }

    /**
     * Validate Rules
     *
     * @param $request
     * @return array
     */
    public function getValidateRules(Request $request)
    {
        return $this->validate($request, $this->model->getValidateList());
    }

    /**
     * Show Index.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query_count = 0;
        $query = $this->model->query();
        if (!empty($request->request)) {
            foreach ($this->searchAction($request->request) as $k => $v) {
                if ($v != NULL && $k != "page") {
                    $query = $query->where($k, 'LIKE', '%' . $v . '%');
                    $query_count++;
                }
            }
        }

        $query = $query->orderBy('created_at', 'desc');
        $lists = $query->paginate($this->_page_num)->appends(request()->except('page'));

        $data = $this->searchData($lists);

        $title = $this->model->getTitle();

        $forms = $this->model->getFormList();
        $tables = $this->model->getTableList();

        return view('layouts.index')->with(compact('title', 'forms', 'data', 'tables', 'lists', 'query_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->model->getTitle();
        $form_title = $this->name;
        $forms = $this->model->getFormList();
        return view('layouts.create')->with(compact('forms', 'title', 'form_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // generate password

        // validate
        $this->getValidateRules($request);

        // save
        $this->model->fill($request->all());
        $result = $this->model->save();
        // dd($result);

        // redirect
        return redirect()->route('' . $this->name . '.index')->withSuccess('保存しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = $this->model->findOrFail($id);
        $title = $this->model->getTitle();
        $forms = $this->model->getFormList();

        return view('layouts.show')->with(compact('data', 'title', 'forms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->model->getTitle();
        $form_title = $this->name;
        $forms = $this->model->getFormList();
        $data = $this->model->find($id);
        return view('layouts.edit')->with(compact('data','forms', 'title', 'form_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $this->getValidateRules($request);

        // save user
        $data = $this->model->find($id);

        $result = $data->update($request->all());
        // dd($result);

        // redirect
        return redirect('admin/'. $this->name)->withSuccess('保存しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->model->find($id)->delete();
        $title = $this->model->getTitle();
        return redirect('/'. strtolower($title[1]))->withSuccess('削除しました。');
    }

    /**
     * Sort method
     *
     */
    public function sorting()
    {
        if (!empty($_POST)) {
            $data = [];
            parse_str($_POST['sortitems'], $data);
            foreach ($data['listitem'] as $key => $id) {
                DB::table($_POST['model'])
                    ->where('id', $id)
                    ->update(['sort' => $key]);
            }
            $response["status"] = "OK";
            $response["message"] = $data['listitem'];
            return $response;
        }
    }

    /**
     * Search method
     *
     * @param null $array
     * @return array $query
     */
    public function searchAction($array = null)
    {
        $query = [];
        foreach ($array as $k => $v) {
            // checkbox
            if (is_array($v)) {
                $query[$k] = implode(",", $v);
                continue;
            }

            // normal
            $query[$k] = $v;
        }
        return $query;
    }

    public function searchData($array = null) {
        $data = new Collection();
        foreach ($array as $k => $v) {
            if ($v == NULL) continue;
            // checkbox
            if (is_array($v)) {
                $data->$k = implode(",", $v);
                continue;
            }

            // normal
            $data->$k = $v;
        }
        return $data;
    }

    public function addNotice($user_id, $name, $url)
    {

    }

    public function unvalid($id) {
        $list = $this->model->find($id);
        $list->valid_flag = 0;
        $list->save();
        return redirect('admin/'. $this->name);
    }
}
