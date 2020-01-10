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
    public function store(Request $request)
    {
        // validate
        $this->getValidateRules($request);

        $insert_data = $request->all();

        $file = $request->file('file');
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
        // validate
        // $this->getValidateAdminRules($request);

        // save user
        $data = $this->model->find($id);

        $file = $request->file('file');

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

    public function upload($id) {
        $title = $this->model->getTitle();
        $form_title = $this->name;
        $forms = $this->model->getFormList();

        return view('layouts.upload')->with(compact( 'title', 'form_title', 'id', 'forms'));

    }

    public function uploadPost(Request $request, $id) {
        // save user
        $data = $this->model->find($id);

        $file = $request->file('file');

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
}
