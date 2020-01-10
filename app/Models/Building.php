<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends AppModel
{
    //
    protected $table = 'building';

    protected $_title = ['物件', 'Building'];

    protected $fillable = ['name', 'price', 'published_at', 'transaction', 'address', 'traffic', 'room_layout', 'exclusive',
        'building_at', 'provider', 'appendix_flg', 'file_name', 'structure'];
    /**
     * Form field.
     *
     * @var array
     */
    protected $_search_forms = ['keyword' => [
        'label' => 'キーワードで検索',
        'type' => 'text', // for form
        'search' => true
    ]];

    protected $_forms = [
        'id' => [
            'label' => '物件番号',
            'type' => 'hide',
            'search' => false,
        ],
        'name' => [
            'label' => '物件名',
            'type' => 'text',
            'search' => false
        ],
        'price' => [
            'label' => '価格',
            'type' => 'text',
            'search' => false,
        ],
        'published_at' => [
            'label' => '情報公開日',
            'type' => 'datetime',
            'sort' => 1,
            'search' => false,
        ],
        'transaction' => [
            'label' => '取引態様',
            'type' => 'select',
            'values' => ['専任媒介' => '専任媒介', '売主' => '売主'],
            'search' => false
        ],
        'address' => [
            'label' => '所在地',
            'type' => 'text',
            'search' => false,
        ],
        'traffic' => [
            'label' => '交通',
            'type' => 'textarea',
            'search' => false
        ],
        'room_layout' => [
            'label' => '間取り',
            'type' => 'text',
            'search' => false,
        ],
        'exclusive' => [
            'label' => '専有面積',
            'type' => 'text',
            'search' => false,
        ],
        'building_at' => [
            'label' => '築年月',
            'type' => 'datetime',
            'sort' => 2,
            'search' => false,
        ],
        'structure' => [
            'label' => '建物構造',
            'type' => 'text',
            'search' => false,
        ],
        'provider' => [
            'label' => '情報提供会社',
            'type' => 'text',
            'search' => false,
        ],
        'appendix_flg' => [
            'label' => '添付ファイル有無',
            'type' => 'select',
            'values' => ['有り' => '有り', '無し' => '無し'],
            'onChange' => 'changeAppendix(this)',
            'search' => false,
        ],
        'file' => [
            'label' => 'ファイル',
            'type' => 'file',
            'search' => false,
            'memo' => '変更する場合は新しくアップロードをしてください'
        ],
    ];

    protected $_validates = [
        'name' => 'sometimes|required|max:50',
        'price' => 'sometimes|required',
        'published_at' => 'sometimes|required',
        'transaction' => 'sometimes|required',
        'address' => 'sometimes|required',
        'traffic' => 'sometimes|required',
        'room_layout' => 'sometimes|required',
        'exclusive' => 'sometimes|required',
        'building_at' => 'sometimes|required',
        'structure' => 'sometimes|required',
        'provider' => 'sometimes|required',
        'appendix_flg' => 'sometimes|required',
        'file' => 'sometimes|mimes:jpg,jpeg,png,gif,zip,pdf,doc,docx',
    ];

//    protected $_validates = [];

    protected $_tables = [
        'fields' => [
            'name' => [
                'label' => '物件名',
                'value' => 'name',
                'class' => '',
            ],
            'price' => [
                'label' => '価格',
                'value' => 'price',
                'class' => '',
            ],
            'published_at' => [
                'label' => '情報公開日',
                'value' => 'published_at',
                'class' => '',
            ],
            'id' => [
                'label' => '物件番号',
                'value' => 'id',
                'class' => '',
            ],
            'transaction' => [
                'label' => '取引態様',
                'value' => 'transaction',
                'class' => '',
            ],
            'address' => [
                'label' => '所在地',
                'value' => 'address',
                'class' => '',
            ],
            'traffic' => [
                'label' => '交通',
                'value' => 'traffic',
                'class' => '',
            ],
            'room_layout' => [
                'label' => '間取り',
                'value' => 'room_layout',
                'class' => '',
            ],
            'exclusive' => [
                'label' => '専有面積',
                'value' => 'exclusive',
                'class' => '',
            ],
            'building_at' => [
                'label' => '築年月',
                'value' => 'building_at',
                'class' => '',
            ],
            'structure' => [
                'label' => '建物構造',
                'value' => 'structure',
                'class' => '',
            ],
            'provider' => [
                'label' => '情報提供会社',
                'value' => 'provider',
                'class' => '',
            ],
            'appendix_flg' => [
                'label' => '添付ファイル有無',
                'value' => 'appendix_flg',
                'class' => '',
            ],
            'upload' => [
                'label' => 'アップロード',
                'value' => 'upload',
                'class' => ''
            ],
            'download' => [
                'label' => 'ダウンロード',
                'value' => 'download',
                'class' => ''
            ],
        ],
        'actions' => ['content' => [
            1 => ['action' => 'edit', 'label' => '編集'],
            2 => ['action' => 'destroy', 'label' => '削除'],
//            3 => ['action' => 'upload', 'label' => 'アップロード'],
//            4 => ['action' => 'download', 'label' => 'ダウンロード'],
        ]
        ]
    ];

}
