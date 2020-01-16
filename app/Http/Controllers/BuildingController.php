<?php

namespace App\Http\Controllers;

use App\Components\ExifComponent;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{

    public function index(Request $request)
    {
        $query_count = 0;
        $query = $this->model->query();
        if (!empty($request->request)) {
            foreach ($this->searchAction($request->request) as $k => $v) {
                if ($v == NULL) continue;
                if ($k == 'created') {
                    $v1 = $v . ' 00:00:00';
                    $v2 = $v . ' 23:59:59';
                    $query = $query->where('created', '>=', $v1)->where('created', '<=', $v2);
                    $query_count++;
                } else if ($k == 'price_lower') {
                    $query = $query->where('price', '>=', $v);
                    $query_count++;
                } else if ($k == 'price_upper') {
                    $query = $query->where('price', '>=', $v);
                    $query_count++;
                } else if ($k == 'building_at_c_lower') {
                    $v1 = $v . '00:00:00';
                    $query = $query->where('building_at', '>=', $v1);
                    $query_count++;
                } else if ($k == 'building_at_c_upper') {
                    $v1 = $v . '23:59:59';
                    $query = $query->where('building_at', '<=', $v1);
                    $query_count++;
                } else if ($k == 'yield_lower') {
                    $query = $query->where('yield', '>=', $v);
                    $query_count++;
                } else if ($k == 'yield_upper') {
                    $query = $query->where('yield', '<=', $v);
                    $query_count++;
                } else if ($k == 'area1_lower') {
                    $query = $query->where('area1', '>=', $v);
                    $query_count++;
                } else if ($k == 'area1_upper') {
                    $query = $query->where('area1', '<=', $v);
                    $query_count++;
                } else if ($k == 'area2_lower') {
                    $query = $query->where('area2', '>=', $v);
                    $query_count++;
                } else if ($k == 'area2_upper') {
                    $query = $query->where('area2', '<=', $v);
                    $query_count++;
                } else if ($k == 'area3_lower') {
                    $query = $query->where('area3', '>=', $v);
                    $query_count++;
                } else if ($k == 'area3_upper') {
                    $query = $query->where('area3', '<=', $v);
                    $query_count++;
                } else if ($k == 'area4_lower') {
                    $query = $query->where('area4', '>=', $v);
                    $query_count++;
                } else if ($k == 'area4_upper') {
                    $query = $query->where('area4', '<=', $v);
                    $query_count++;
                } else if ($k != "page") {
                    $v1 = mb_convert_kana($v, 'kKVaAsS');
//                    $v1 = $v;
                    $query = $query->where($k, 'LIKE', '%' . $v1 . '%');
                    $query_count++;
                }
            }
        }

        $query = $query->orderBy('created_at', 'desc');
        $lists = $query->paginate($this->_page_num)->appends(request()->except('page'));
        foreach ($lists as $list) {
            $list->created = date('Y-m-d', strtotime($list->created));
        }

        $data = $this->searchData($request->all());

        $title = $this->model->getTitle();

        $forms = $this->model->getFormList();
        $tables = $this->model->getTableList();

        return view('layouts.index')->with(compact('title', 'forms', 'data', 'tables', 'lists', 'query_count'));
    }

    public function create()
    {
        $title = $this->model->getTitle();
        $form_title = $this->name;
        $forms = $this->model->getFormList();
        return view('layouts.create')->with(compact('forms', 'title', 'form_title'));
    }

    public function edit($id)
    {
        $title = $this->model->getTitle();
        $form_title = $this->name;
        $forms = $this->model->getFormList();
        $data = $this->model->find($id);
        $data['created'] = date('Y-m-d', strtotime($data['created']));
        $data['building_at'] = date('Y-m-d', strtotime($data['building_at']));

        return view('layouts.edit')->with(compact('data','forms', 'title', 'form_title'));
    }

    public function store(Request $request)
    {
        $request->merge(['price' => str_replace(",", "", $request->price)]);

        $req_data = $request->all();

        if ($req_data['building_at-reki'] == 'building_at-wareki') {
            $nenngou = $req_data['building_at-nenngou'];

            $year = $req_data['building_at-year'];

            if ($year) {
                $month = $req_data['building_at-month'] ? $req_data['building_at-month'] : 01;
                $day = $req_data['building_at-day'] ? $req_data['building_at-day'] : 01;

                if ($nenngou == 0) {
                    $year += 1867;
                } else if ($nenngou == 1) {
                    $year += 1911;
                } else if ($nenngou == 2) {
                    $year += 1925;
                } else if ($nenngou == 3) {
                    $year += 1988;
                } else if ($nenngou == 4) {
                    $year += 2018;
                }

                $date = $year . '-' . $month . '-' . $day;

                $building_at = date('Y-m-d h:i:s', strtotime($date));

            } else {
                $building_at = '';
            }

            $request->merge(['building_at' => $building_at]);
        }
//        var_dump($request->all()); exit;
        // validate
        $this->getValidateRules($request);

        $insert_data = $request->all();

        $file = $request->file('file_name');
        // 画像名
        if (!empty($file)) {
            $destinationPath = 'uploads';

            $filename = time() . uniqid(rand()) . '.' . $file->getClientOriginalExtension();
            $insert_data['file_name'] = $filename;

            $file->move($destinationPath, $filename);

        }

        // save
        $this->model->fill($insert_data);
        $result = $this->model->save();

        // redirect
        return redirect()->route($this->name . '.index')->withSuccess('保存しました。');
    }

    public function update(Request $request, $id)
    {
        $request->merge(['price' => str_replace(",", "", $request->price)]);

        $req_data = $request->all();

        if ($req_data['building_at-reki'] == 'building_at-wareki') {
            $nenngou = $req_data['building_at-nenngou'];

            $year = $req_data['building_at-year'];

            if ($year) {
                $month = $req_data['building_at-month'] ? $req_data['building_at-month'] : 01;
                $day = $req_data['building_at-day'] ? $req_data['building_at-day'] : 01;

                if ($nenngou == 0) {
                    $year += 1867;
                } else if ($nenngou == 1) {
                    $year += 1911;
                } else if ($nenngou == 2) {
                    $year += 1925;
                } else if ($nenngou == 3) {
                    $year += 1988;
                } else if ($nenngou == 4) {
                    $year += 2018;
                }

                $date = $year . '-' . $month . '-' . $day;

                $building_at = date('Y-m-d h:i:s', strtotime($date));

            } else {
                $building_at = '';
            }

            $request->merge(['building_at' => $building_at]);
        }
        // validate
        // $this->getValidateAdminRules($request);

        $this->getValidateRules($request);

        // save user
        $data = $this->model->find($id);

        $file = $request->file('file_name');

        $update_data = $request->all();
        // 画像名
        if (!empty($file)) {
            $destinationPath = 'uploads';

            $filename = time() . uniqid(rand()) . '.' . $file->getClientOriginalExtension();
            $update_data['file_name'] = $filename;

            $file->move($destinationPath, $filename);

        }

        $data->update($update_data);

        return redirect($this->name)->withSuccess('保存しました。');
    }

    public function show($id) {
        $data = $this->model->findOrFail($id);
        $data['created'] = date('Y-m-d', strtotime($data['created']));
        $data['building_at'] = date('Y-m-d', strtotime($data['building_at']));

        $title = $this->model->getTitle();
        $forms = $this->model->getFormList();

        return view('layouts.show')->with(compact('data', 'title', 'forms'));
    }

    public function upload($id) {
        $title = $this->model->getTitle();
        $form_title = $this->name;
        $forms = $this->model->getFormList();

        return view('layouts.upload')->with(compact( 'title', 'form_title', 'id', 'forms'));

    }

    public function uploadPost(Request $request, $id) {
        // save user
        $data = $this->model->find($id);

        $file = $request->file('file_name');

        $update_data = [];
        // 画像名
        if (!empty($file)) {
            $destinationPath = 'uploads';

            $filename = time() . uniqid(rand()) . '.' . $file->getClientOriginalExtension();
            $update_data['file_name'] = $filename;

            $file->move($destinationPath, $filename);
        }

        $data->update($update_data);

        return redirect($this->name)->withSuccess('保存しました。');
    }

    public function download($id) {
        $building = Building::find($id);
        $file_name = $building->file_name;
//        $file_path = asset('upload/' . $file_name);
        $file_path = 'uploads/' . $file_name;

        if (file_exists($file_path)) {
            return Response::download($file_path, $file_name, [
                'Content-Length: '. filesize($file_path)
            ]);
        }

    }

    public function downloads($str) {
        $ids = explode("&", $str);
        foreach ($ids as $id) {
            $building = Building::find($id);
            $file_name = $building->file_name;
//        $file_path = asset('upload/' . $file_name);
            $file_path = 'uploads/' . $file_name;

            if (file_exists($file_path)) {
                return Response::download($file_path, $file_name, [
                    'Content-Length: '. filesize($file_path)
                ]);
            }
        }
    }
}
