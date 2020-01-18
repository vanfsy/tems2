<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends AppModel
{
    //
    protected $table = 'building';

    protected $_title = ['物件', 'Building'];

    protected $fillable = ['name', 'created', 'price', 'provider', 'building_at', 'yield', 'type',
        'structure', 'near_station', 'near_station_time', 'residance_pref', 'residance_city', 'residance_address', 'pref',
        'city', 'address', 'area1', 'area2', 'area3', 'area4', 'file_name'];
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

//        'created' => [
//            'label' => '登録日',
//            'type' => 'datetime',
//            'sort' => 99,
//            'search' => true
//        ],
        'provider' => [
            'label' => '物元',
            'type' => 'text',
            'search' => true
        ],
        'price' => [
            'label' => '価格',
            'type' => 'two_texts',
            'search' => true,
        ],
        'building_at_c' => [
            'label' => '築年',
            'type' => 'two_datetimes',
            'sort' => [1,2],
            'cal_type' => 'date',
            'search' => true,
        ],
        'building_at' => [
            'label' => '築年',
            'type' => 'datetime1',
            'sort' => 98,
            'cal_type' => 'date',
            'search' => false,
        ],
        'yield' => [
            'label' => '利回り',
            'type' => 'two_texts',
            'search' => true,
        ],
        'type' => [
            'label' => '種類',
            'type' => 'text',
            'search' => true,
        ],
        'structure' => [
            'label' => '構造',
            'type' => 'text',
            'search' => true,
        ],
        'name' => [
            'label' => '物件名',
            'type' => 'text',
            'search' => true,
        ],
        'near_station' => [
            'label' => '最寄り駅名',
            'type' => 'text',
            'search' => true,
        ],
        'near_station_time' => [
            'label' => '上限徒歩・バス・車・高速何分',
            'type' => 'text',
            'search' => true,
        ],
        'residance_pref' => [
            'label' => '所在地（住居表示）①(都道府県)',
            'type' => 'text',
            'search' => true,
        ],
        'residance_city' => [
            'label' => '所在地（住居表示）②区・市',
            'type' => 'text',
            'search' => true,
        ],
        'residance_address' => [
            'label' => '所在地（住居表示）③区・etc',
            'type' => 'text',
            'search' => true,
        ],
        'pref' => [
            'label' => '所在地（地番）①(都道府県)',
            'type' => 'text',
            'search' => true,
        ],
        'city' => [
            'label' => '所在地（地番）②区・市',
            'type' => 'text',
            'search' => true,
        ],
        'address' => [
            'label' => '所在地（地番）③区・etc',
            'type' => 'text',
            'search' => true,
        ],
        'area1' => [
            'label' => '地積・登記簿（㎡）',
            'type' => 'two_texts',
            'search' => true,
        ],
        'area2' => [
            'label' => '地積・登記簿（坪）',
            'type' => 'two_texts',
            'search' => true,
        ],
        'area3' => [
            'label' => '地積・実測（㎡）',
            'type' => 'two_texts',
            'search' => true,
        ],
        'area4' => [
            'label' => '地積・実測（坪）',
            'type' => 'two_texts',
            'search' => true,
        ],

//        'published_at' => [
//            'label' => '情報公開日',
//            'type' => 'datetime',
//            'sort' => 3,
//            'search' => false,
//        ],
//        'transaction' => [
//            'label' => '取引態様',
//            'type' => 'select',
//            'values' => ['専任媒介' => '専任媒介', '売主' => '売主'],
//            'search' => false
//        ],
//        'address' => [
//            'label' => '所在地',
//            'type' => 'text',
//            'search' => false,
//        ],
//        'traffic' => [
//            'label' => '交通',
//            'type' => 'textarea',
//            'search' => false
//        ],
//        'room_layout' => [
//            'label' => '間取り',
//            'type' => 'text',
//            'search' => false,
//        ],
//        'exclusive' => [
//            'label' => '専有面積',
//            'type' => 'text',
//            'search' => false,
//        ],
//
//
//        'provider' => [
//            'label' => '情報提供会社',
//            'type' => 'text',
//            'search' => false,
//        ],
//        'appendix_flg' => [
//            'label' => '添付ファイル有無',
//            'type' => 'select',
//            'values' => ['有り' => '有り', '無し' => '無し'],
//            'onChange' => 'changeAppendix(this)',
//            'search' => false,
//        ],
        'file_name' => [
            'label' => 'ファイル',
            'type' => 'file',
            'search' => false,
            'memo' => '変更する場合は新しくアップロードをしてください'
        ],
    ];

    protected $_validates = [
//        'name' => 'sometimes|required|max:50',
//        'provider' => 'sometimes|required',
//        'price' => 'sometimes|required|numeric',
////        'building_at' => 'sometimes|required_if:building_at-reki,building_at-seireki',
//        'building_at' => 'sometimes|required',
//        'created' => 'sometimes|required',
//        'yield' => 'sometimes|required|numeric',
//        'type' => 'sometimes|required',
//        'structure' => 'sometimes|required',
//        'near_station' => 'sometimes|required',
//        'near_station_time' => 'sometimes|required',
//        'residance_pref' => 'sometimes|required',
//        'residance_city' => 'sometimes|required',
//        'residance_address' => 'sometimes|required',
////        'pref' => 'sometimes|required',
////        'city' => 'sometimes|required',
////        'address' => 'sometimes|required',
//        'area1' => 'sometimes|required|numeric',
//        'area2' => 'sometimes|required|numeric',
////        'area3' => 'sometimes|required|numeric',
////        'area4' => 'sometimes|required|numeric',
        'file' => 'sometimes|mimes:jpg,jpeg,png,gif,zip,pdf,doc,docx',
    ];

//    protected $_validates = [];

    protected $_tables = [
        'fields' => [
            'ids' => [
                'label' => '',
                'value' => 'ids',
                'class' => 'w-30',
                'td_class' => 'w-30'
            ],
            'name' => [
                'label' => '物件名',
                'value' => 'name',
                'class' => '',
            ],
            'created_at' => [
                'label' => '登録日',
                'value' => 'created_at',
                'class' => '',
            ],
            'show' => [
                'label' => '詳細',
                'value' => 'show',
                'class' => ''
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
