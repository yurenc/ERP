<?php
//配置文件
return [
    'template'  =>  [
        'layout_on'     =>  true,
        'layout_name'   =>  'layout',
    ],

    'menu'  =>[
        'index'     =>[         //首页导航
            [
                'name'  =>  '常用功能',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '快捷导航',
                        'controller'=>  'Index',
                        'action'    =>  'index'
                    ],
                ]
            ],
        ],//end
        'sumao'     =>[           //苏州贸易部导航
            [
                'name'  =>  '订单管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '添加订单',
                        'controller'=>  'Sumao',
                        'action'    =>  'jiedan'
                    ],
                    [
                        'name'      =>  '订单管理',
                        'controller'=>  'Sumao',
                        'action'    =>  'order'
                    ],
                ]
            ],
            [
                'name'  =>  '仓库管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '库存统计',
                        'controller'=>  'Sumao',
                        'action'    =>  'sukucun'
                    ],
                    [
                        'name'      =>  '出入库流水',
                        'controller'=>  'Sumao',
                        'action'    =>  'sukurecord'
                    ],
                    // [
                    //     'name'      =>  '苏州备货记录',
                    //     'controller'=>  'Sumao',
                    //     'action'    =>  'beihuo'
                    // ]
                ]
            ],
            [
                'name'  =>  '物流管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '发货管理',
                        'controller'=>  'Sumao',
                        'action'    =>  'songhuo'
                    ],
                    [
                        'name'      =>  '收货管理',
                        'controller'=>  'Sumao',
                        'action'    =>  'shouhuo'
                    ],
                    [
                        'name'      =>  '回单确认',
                        'controller'=>  'Sumao',
                        'action'    =>  'kehuqueren'
                    ],
                ]
            ],

        ],//end
        'nansheng'     =>[         //南通生产部导航
            [
                'name'  =>  '业务部管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '业务订单',
                        'controller'=>  'Nansheng',
                        'action'    =>  'yworder'
                    ],
                    [
                        'name'      =>  '生产订单',
                        'controller'=>  'Nansheng',
                        'action'    =>  'scorder'
                    ],
                ]
            ],
            [
                'name'  =>  '南通仓库管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '出入库流水',
                        'controller'=>  'Nansheng',
                        'action'    =>  'nankurecord'
                    ],
                    [
                        'name'      =>  '库存统计',
                        'controller'=>  'Nansheng',
                        'action'    =>  'nankucun'
                    ],
                ]
            ],
            [
                'name'  =>  '南通物流管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '装车管理',
                        'controller'=>  'Nansheng',
                        'action'    =>  'songhuo'
                    ],
                    [
                        'name'      =>  '南通代发',
                        'controller'=>  'Nansheng',
                        'action'    =>  'daifa'
                    ],
                ]
            ],
        ],//end
        'caigou'     =>[         //采购管理导航
            [
                'name'  =>  '苏州采购部',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '采购管理',
                        'controller'=>  'Caigou',
                        'action'    =>  'cgorder'
                    ],
                    [
                        'name'      =>  '苏州物流',
                        'controller'=>  'Caigou',
                        'action'    =>  'cgszwuliu'
                    ],
                ]
            ],
            [
                'name'  =>  '南通采购部',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '申请采购',
                        'controller'=>  'Caigou',
                        'action'    =>  'cgapply'
                    ],
                    [
                        'name'      =>  '采购查询',
                        'controller'=>  'Caigou',
                        'action'    =>  'cxorder'
                    ],
                    [
                        'name'      =>  '材料仓库',
                        'controller'=>  'Caigou',
                        'action'    =>  'cgntwuliu'
                    ],
                ]
            ],
        ],//end
        'user'     =>[         //会员管理导航
            [
                'name'  =>  '通讯录管理',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '客户统计',
                        'controller'=>  'User',
                        'action'    =>  'kehu'
                    ],
                    [
                        'name'      =>  '供应商统计',
                        'controller'=>  'User',
                        'action'    =>  'suppliers'
                    ],
                ]
            ],
            [
                'name'  =>  '管理员设置',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '角色设置',
                        'controller'=>  'User',
                        'action'    =>  'role'
                    ],
                    [
                        'name'      =>  '成员设置',
                        'controller'=>  'User',
                        'action'    =>  'member'
                    ],
                ]
            ],
        ],//end
        'tongji'     =>[         //统计报表
            [
                'name'  =>  '财务中心',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '财务收款',
                        'controller'=>  'Sumao',
                        'action'    =>  'shoukuan'
                    ],
                    [
                        'name'      =>  '采购打款',
                        'controller'=>  'Caigou',
                        'action'    =>  'cgdakuan'
                    ],
                ]
            ],
            [
                'name'  =>  '统计中心',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '月销统计',
                        'controller'=>  'Tongji',
                        'action'    =>  'monthtj'
                    ],
                    [
                        'name'      =>  '销量排行',
                        'controller'=>  'Tongji',
                        'action'    =>  'paihangtj'
                    ],
                ]
            ],
        ],//end
        'system'     =>[         //系统设置导航
            [
                'name'  =>  '产品数据',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '产品统计',
                        'controller'=>  'Goods',
                        'action'    =>  'goods'
                    ],
                ]
            ],
            [
                'name'  =>  '系统参数',
                'url'   =>  'javascript:;',
                'child' =>  [
                    [
                        'name'      =>  '站点参数',
                        'controller'=>  'System',
                        'action'    =>  'index'
                    ],
                ]
            ],
        ],//end

    ],

];