/*
MySQL Backup
Source Server Version: 5.5.54
Source Database: erp
Date: 2018/3/1 16:01:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `erp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `erp_admin`;
CREATE TABLE `erp_admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `roleid` int(10) NOT NULL COMMENT '角色ID',
  `uname` varchar(40) NOT NULL COMMENT '用户名',
  `pwd` varchar(40) NOT NULL COMMENT '密码',
  `key` varchar(4) NOT NULL COMMENT '密钥',
  `realname` varchar(40) NOT NULL COMMENT '店名',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `mbtel` varchar(20) NOT NULL COMMENT '手机号',
  `telphone` varchar(20) NOT NULL COMMENT '座机',
  `logintime` int(10) NOT NULL COMMENT '最近登录时间',
  `loginip` varchar(30) NOT NULL COMMENT '登录IP',
  `islock` int(2) NOT NULL COMMENT '锁定',
  `status` int(4) NOT NULL DEFAULT '1',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备忘录',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_beihuo`
-- ----------------------------
DROP TABLE IF EXISTS `erp_beihuo`;
CREATE TABLE `erp_beihuo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别:床垫/软体沙发',
  `leibie` varchar(50) NOT NULL DEFAULT '' COMMENT '类别',
  `brand` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '型号',
  `size` varchar(100) NOT NULL DEFAULT '' COMMENT '规格',
  `parma` varchar(100) NOT NULL DEFAULT '' COMMENT '布号/方向',
  `jianshu` int(11) NOT NULL DEFAULT '0' COMMENT '件数',
  `sudf` varchar(100) NOT NULL DEFAULT '' COMMENT '苏州堆放区域',
  `nandf` varchar(100) NOT NULL DEFAULT '' COMMENT '南通堆放区域',
  `number` int(11) NOT NULL COMMENT '备货的数量',
  `cangku` varchar(255) NOT NULL COMMENT '备货的仓库(suzhou,nantong）',
  `addtime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_caigou`
-- ----------------------------
DROP TABLE IF EXISTS `erp_caigou`;
CREATE TABLE `erp_caigou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(100) NOT NULL DEFAULT '' COMMENT '供应商',
  `caigoutime` datetime NOT NULL COMMENT '采购日期',
  `pinming` varchar(100) NOT NULL DEFAULT '' COMMENT '品名',
  `leibie` varchar(100) NOT NULL DEFAULT '' COMMENT '类别',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '型号',
  `size` varchar(50) NOT NULL DEFAULT '' COMMENT '规格',
  `danwei` varchar(50) NOT NULL DEFAULT '' COMMENT '单位',
  `number` int(11) NOT NULL DEFAULT '0' COMMENT '数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '单价',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `shtime` date NOT NULL COMMENT '要求送货日期',
  `fhtime` date NOT NULL COMMENT '供应商发货日期',
  `dhtime` date NOT NULL COMMENT '到货日期',
  `zcid` int(11) NOT NULL DEFAULT '0' COMMENT '转款合并订单的id',
  `zcstatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '装车状态：0未装车，1等待装车，2苏州装车，3南通收货',
  `zkid` int(11) NOT NULL DEFAULT '0' COMMENT '转款ID',
  `zkstatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '转款状态，0未转款，1已转款',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1：待处理；2：已完成',
  `wctime` datetime NOT NULL COMMENT ' 完成时间',
  `isdelete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除，0不删，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_caigou_zc`
-- ----------------------------
DROP TABLE IF EXISTS `erp_caigou_zc`;
CREATE TABLE `erp_caigou_zc` (
  `zcid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `zhuangchetime` datetime NOT NULL COMMENT '装车时间',
  `completetime` datetime NOT NULL COMMENT '完成时间(也就是南通收货时间)',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0删除，1已开单等待装车，2苏州已装车，3南通确认收货',
  PRIMARY KEY (`zcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `erp_caigou_zk`
-- ----------------------------
DROP TABLE IF EXISTS `erp_caigou_zk`;
CREATE TABLE `erp_caigou_zk` (
  `zkid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `supplier` varchar(100) NOT NULL COMMENT '供应商名称',
  `danhao` varchar(255) NOT NULL COMMENT '供应商那边的单号',
  `total` decimal(10,0) NOT NULL COMMENT '总计',
  `shifu` decimal(10,0) NOT NULL COMMENT '实付金额',
  `addtime` datetime NOT NULL COMMENT '添加订单日期',
  `zktime` datetime NOT NULL COMMENT '转款日期',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0：删除；1：未付款；2：已付款',
  `zkfs` varchar(50) NOT NULL DEFAULT '' COMMENT '转款方式',
  PRIMARY KEY (`zkid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `erp_cangku_log`
-- ----------------------------
DROP TABLE IF EXISTS `erp_cangku_log`;
CREATE TABLE `erp_cangku_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL COMMENT '所属订单ID',
  `uid` int(11) NOT NULL COMMENT '订单所属的用户ID',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别:床垫/软体沙发',
  `leibie` varchar(50) NOT NULL DEFAULT '' COMMENT '类别',
  `brand` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '型号',
  `size` varchar(100) NOT NULL DEFAULT '' COMMENT '规格',
  `parma` varchar(100) NOT NULL DEFAULT '' COMMENT '布号/方向',
  `duifang` varchar(100) NOT NULL DEFAULT '' COMMENT '区域',
  `cangku` tinyint(4) NOT NULL DEFAULT '0' COMMENT '仓库：1苏州仓库；2南通仓库',
  `change` tinyint(11) NOT NULL COMMENT '库存改变量，负数为减库存',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_goods`
-- ----------------------------
DROP TABLE IF EXISTS `erp_goods`;
CREATE TABLE `erp_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别:床垫/软体沙发',
  `leibie` varchar(50) NOT NULL DEFAULT '' COMMENT '类别',
  `brand` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '型号',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0下架，1上架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `erp_goods_attr`;
CREATE TABLE `erp_goods_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '产品属性ID',
  `gid` int(11) NOT NULL COMMENT '产品id，对应表erp_goods',
  `size` varchar(100) NOT NULL DEFAULT '' COMMENT '规格',
  `parma` varchar(100) NOT NULL DEFAULT '' COMMENT '布号/方向',
  `jianshu` int(11) NOT NULL DEFAULT '0' COMMENT '件数',
  `sunum` int(11) NOT NULL DEFAULT '0' COMMENT '苏州库存数',
  `nannum` int(11) NOT NULL DEFAULT '0' COMMENT '南通库存数',
  `sudf` varchar(100) NOT NULL DEFAULT '' COMMENT '苏州堆放区域',
  `nandf` varchar(100) NOT NULL DEFAULT '' COMMENT '南通堆放区域',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_goods_log`
-- ----------------------------
DROP TABLE IF EXISTS `erp_goods_log`;
CREATE TABLE `erp_goods_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `action` varchar(50) NOT NULL DEFAULT '' COMMENT '操作：“增加”，“删除”，“修改”',
  `content` text NOT NULL COMMENT '修改内容',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员',
  `addtime` datetime NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `erp_kehu`
-- ----------------------------
DROP TABLE IF EXISTS `erp_kehu`;
CREATE TABLE `erp_kehu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nicheng` varchar(100) NOT NULL DEFAULT '' COMMENT '客户简称',
  `uname` varchar(100) NOT NULL DEFAULT '' COMMENT '客户全称',
  `linkman` varchar(100) NOT NULL DEFAULT '' COMMENT '联系人',
  `mobile` varchar(255) NOT NULL DEFAULT '' COMMENT '客户联系方式',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '客户地址',
  `wuliu` varchar(255) NOT NULL DEFAULT '' COMMENT '物流',
  `nashui` varchar(255) NOT NULL DEFAULT '' COMMENT '纳税号->改为发货地',
  `edu` varchar(50) NOT NULL DEFAULT '' COMMENT '信誉额度',
  `level` varchar(50) NOT NULL DEFAULT '' COMMENT '客户等级',
  `jkfs` varchar(100) NOT NULL COMMENT '结款方式',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_menu`
-- ----------------------------
DROP TABLE IF EXISTS `erp_menu`;
CREATE TABLE `erp_menu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '菜单名称',
  `status` int(8) NOT NULL DEFAULT '1' COMMENT '状态',
  `sort` int(8) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_order_details`
-- ----------------------------
DROP TABLE IF EXISTS `erp_order_details`;
CREATE TABLE `erp_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL COMMENT '所属订单ID',
  `goods_sn` varchar(100) NOT NULL DEFAULT '' COMMENT '商品编号（唯一）gid-attrid',
  `leibie` varchar(50) NOT NULL DEFAULT '' COMMENT '类别',
  `brand` varchar(30) NOT NULL DEFAULT '' COMMENT '品牌',
  `type` varchar(30) NOT NULL DEFAULT '' COMMENT '型号',
  `size` varchar(30) NOT NULL DEFAULT '' COMMENT '规格',
  `parma` varchar(50) NOT NULL DEFAULT '' COMMENT '自定义变量：布号/方向',
  `number` int(10) NOT NULL COMMENT '数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '单价',
  `duifang` varchar(20) NOT NULL DEFAULT '' COMMENT '堆放区域',
  `isdelete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除：0不删除，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_order_fh`
-- ----------------------------
DROP TABLE IF EXISTS `erp_order_fh`;
CREATE TABLE `erp_order_fh` (
  `fhid` int(11) NOT NULL AUTO_INCREMENT COMMENT '发货ID',
  `oid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别：床垫/沙发软体',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `uid` int(11) NOT NULL COMMENT '客户编号',
  `uname` varchar(50) NOT NULL DEFAULT '' COMMENT '客户名称',
  `wuliu` varchar(100) NOT NULL DEFAULT '' COMMENT '物流',
  `mobile` varchar(100) NOT NULL DEFAULT '' COMMENT '联系方式',
  `payment` varchar(50) NOT NULL DEFAULT '' COMMENT '收款方式',
  `fahuodi` tinyint(4) NOT NULL DEFAULT '0' COMMENT '发货地：1苏州发货，2南通待发',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0删除，1待发货，2已发货，3客户签收',
  `fhtime` datetime NOT NULL COMMENT '发货时间',
  `wctime` datetime NOT NULL COMMENT '客户签收时间',
  `total` decimal(10,2) NOT NULL COMMENT '总计',
  PRIMARY KEY (`fhid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_order_info`
-- ----------------------------
DROP TABLE IF EXISTS `erp_order_info`;
CREATE TABLE `erp_order_info` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `usercode` int(11) NOT NULL COMMENT '用户编号',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '客户名称',
  `category` varchar(30) NOT NULL DEFAULT '' COMMENT '分类：床垫/软体沙发',
  `xiadantime` datetime NOT NULL COMMENT '下单日期',
  `yqshtime` date NOT NULL COMMENT '要求送货日期',
  `shaddress` varchar(255) NOT NULL DEFAULT '' COMMENT '送货地址',
  `payment` varchar(50) NOT NULL DEFAULT '' COMMENT '收款方式',
  `total` decimal(10,2) NOT NULL COMMENT '总金额',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `shipping_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '发货状态：0:待发货，1:部分发货，2:已发货，3:回单确认',
  `pay_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付状态：0:未付款，1:已付款',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:删除订单，1:正常',
  `shoukuan` decimal(10,2) NOT NULL COMMENT '收款金额',
  `sktime` datetime NOT NULL COMMENT '收款时间',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_order_sc`
-- ----------------------------
DROP TABLE IF EXISTS `erp_order_sc`;
CREATE TABLE `erp_order_sc` (
  `scid` int(11) NOT NULL AUTO_INCREMENT COMMENT '生产ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别：床垫/沙发软体',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `completetime` datetime NOT NULL COMMENT '完成时间',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0删除，1待处理，2处理完成',
  PRIMARY KEY (`scid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_order_yh`
-- ----------------------------
DROP TABLE IF EXISTS `erp_order_yh`;
CREATE TABLE `erp_order_yh` (
  `yhid` int(11) NOT NULL AUTO_INCREMENT COMMENT '要货ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别：床垫/沙发软体',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0删除，1待处理，2处理完成',
  `completetime` datetime NOT NULL COMMENT '完成时间',
  PRIMARY KEY (`yhid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_order_zc`
-- ----------------------------
DROP TABLE IF EXISTS `erp_order_zc`;
CREATE TABLE `erp_order_zc` (
  `zcid` int(11) NOT NULL AUTO_INCREMENT COMMENT '装车ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '类别：床垫/沙发软体',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `zhuangchetime` datetime NOT NULL COMMENT '装车时间',
  `completetime` datetime NOT NULL COMMENT '完成时间',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `admin` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0删除，1待装车，2南通确认出货，3苏州确认收货',
  PRIMARY KEY (`zcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_role`
-- ----------------------------
DROP TABLE IF EXISTS `erp_role`;
CREATE TABLE `erp_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL COMMENT '权限逗号隔开',
  `name` varchar(40) NOT NULL COMMENT '角色名',
  `status` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_suppliers`
-- ----------------------------
DROP TABLE IF EXISTS `erp_suppliers`;
CREATE TABLE `erp_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(255) NOT NULL DEFAULT '' COMMENT '供应商',
  `mobile` varchar(255) NOT NULL DEFAULT '' COMMENT '联系方式',
  `gname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `type` varchar(255) NOT NULL DEFAULT '' COMMENT '型号',
  `size` varchar(255) NOT NULL DEFAULT '' COMMENT '规格',
  `danwei` varchar(255) NOT NULL DEFAULT '' COMMENT '单位',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '单价',
  `note` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `erp_system`
-- ----------------------------
DROP TABLE IF EXISTS `erp_system`;
CREATE TABLE `erp_system` (
  `key` varchar(255) NOT NULL DEFAULT '' COMMENT '系统参数键',
  `value` varchar(255) NOT NULL DEFAULT '' COMMENT '系统参数值',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `erp_admin` VALUES ('1','1','admin','21232f297a57a5a743894a0e4a801fc3','','','','','','','0','','0','1',''), ('2','2','圣达菲','sdf ','','','','','','','0','','0','0',''), ('3','2','张三','21232f297a57a5a743894a0e4a801fc3','','','','','','','0','','0','1',''), ('4','4','hongjingjing','e10adc3949ba59abbe56e057f20f883e','','','','','','','0','','0','1','');
INSERT INTO `erp_beihuo` VALUES ('1','1','床垫','椰棕床垫','爱优','A-001','1800*2000','1#','1','A区','10区','10','suzhou','2018-02-28 21:27:23','1'), ('2','5','床垫','乳胶床垫','爱优','A-8080','1800*2000','3号','1','A区','B区','8','suzhou','2018-02-28 21:27:56','1'), ('3','13','床垫','乳胶床垫','爱优','A-8080','77','77','77','77','77','3','suzhou','2018-02-28 21:28:16','1'), ('4','9','床垫','2','2','2','2','2','2','2','2','8','suzhou','2018-02-28 21:28:51','1');
INSERT INTO `erp_cangku_log` VALUES ('1','8','1','床垫','55','55','55','55','55','55','1','-5','2018-02-28 20:05:52'), ('2','8','1','床垫','77','77','77','88','88','88','1','-7','2018-02-28 20:05:52');
INSERT INTO `erp_goods` VALUES ('1','床垫','椰棕床垫','爱优','A-001','00','1'), ('2','床垫','乳胶床垫','米特','M-001','00','1'), ('3','软体沙发','皮沙发','福龙皇冠','F-001','00','1'), ('7','床垫','乳胶床垫','爱优','A-8080','乳白色','1'), ('8','床垫','8','9','9','9','1'), ('9','床垫','2','2','2','2','1'), ('10','床垫','55','55','55','-55','1'), ('11','床垫','77','77','77','-77','1'), ('12','床垫','9','9','9','-9','1'), ('13','床垫','7','7','7','-7','1');
INSERT INTO `erp_goods_attr` VALUES ('1','1','1800*2000','1#','1','1','7','A区','10区','3000.00'), ('2','1','1500*1800','1#','1','867','1','A区','9区','2900.00'), ('5','7','1800*2000','3号','1','2','2','A区','B区','3000.00'), ('8','8','7','7','7','7','7','7','7','7.00'), ('9','9','2','2','2','2','2','2','2','2.00'), ('10','3','4','4','4','4','4','4','4','4.00'), ('11','10','55','55','55','45','55','55','55','55.00'), ('12','10','66','66','66','66','66','66','66','66.00'), ('13','7','77','77','77','77','77','77','77','77.00'), ('14','11','88','88','88','81','88','88','88','88.00'), ('15','12','9','9','9','9','9','9','9','9.00'), ('16','12','8','8','8','8','8','8','8','8.00'), ('17','13','7','7','7','7','7','7','7','7.00'), ('18','13','8','8','8','8','8','8','8','8.00');
INSERT INTO `erp_goods_log` VALUES ('1','修改库存','attr_id=>1,changenum=>7,ck=>nannum,','admin','2018-01-03 09:39:43'), ('2','修改库存','attr_id=>1,changenum=>99,ck=>sunum,','admin','2018-01-03 09:49:14'), ('3','添加产品','category=>床垫,type=>77,brand=>77,leibie=>77,note=>-77,','admin','2018-01-03 11:03:19'), ('4','添加产品','category=>床垫,type=>9,brand=>9,leibie=>9,note=>-9,(0=>9,1=>8,)(0=>9,1=>8,)(0=>9,1=>8,)(0=>9,1=>8,)(0=>9,1=>8,)(0=>9,1=>8,)(0=>9,1=>8,)(0=>9,1=>8,)','admin','2018-01-03 11:06:42'), ('5','添加产品','category=>床垫,type=>7,brand=>7,leibie=>7,note=>-7,size=>(0=>7,1=>8,),parma=>(0=>7,1=>8,),jianshu=>(0=>7,1=>8,),sunum=>(0=>7,1=>8,),nannum=>(0=>7,1=>8,),sudf=>(0=>7,1=>8,),nandf=>(0=>7,1=>8,),price=>(0=>7,1=>8,),','admin','2018-01-03 11:08:08'), ('6','修改库存','attr_id=>2,changenum=>12,ck=>sunum,','admin','2018-01-04 19:10:28'), ('7','修改产品','gid=>10,category=>床垫,type=>55,brand=>55,leibie=>55,note=>-55,attr_id=>(0=>11,1=>12,),size=>(0=>55,1=>66,),parma=>(0=>55,1=>66,),jianshu=>(0=>55,1=>66,),sunum=>(0=>55,1=>66,),nannum=>(0=>55,1=>66,),sudf=>(0=>55,1=>66,),nandf=>(0=>55,1=>66,),price=>(0=>55.00,1=>66.00,),','admin','2018-02-27 15:38:09'), ('8','修改库存','attr_id=>2,changenum=>10,ck=>sunum,','admin','2018-02-28 20:56:12'), ('9','修改库存','attr_id=>1,changenum=>10,ck=>sunum,','admin','2018-02-28 20:58:43'), ('10','修改库存','attr_id=>2,changenum=>9,ck=>sunum,','admin','2018-02-28 20:58:52'), ('11','修改库存','attr_id=>1,changenum=>88,ck=>sunum,','admin','2018-02-28 20:59:50'), ('12','修改库存','attr_id=>2,changenum=>867,ck=>sunum,','admin','2018-02-28 20:59:56'), ('13','修改库存','attr_id=>1,changenum=>1,ck=>sunum,','admin','2018-02-28 21:27:04');
INSERT INTO `erp_kehu` VALUES ('1','以马内利','苏州以马内利家具厂','庞林','18888888888','苏州市相城区澄波路458号星星云电商商城','安能物流19999999999','苏州','10000','一级','月结','1'), ('2','福龙皇冠','海门福龙皇冠家具厂','张三','19999999999','海门市中南世纪城对面','18888888888','南通','10000','一级','现结','1');
INSERT INTO `erp_menu` VALUES ('1','苏州业务部-业务接单','1','10'), ('2','苏州业务部-订单统计','1','11'), ('3','苏州仓库-出入库流水','1','12'), ('4','苏州仓库-库存统计-查询','1','13'), ('5','苏州物流-发货管理','1','14'), ('6','苏州物流-收货管理','1','15'), ('7','苏州物流-客户确认','1','16'), ('8','南通业务部-业务订单','1','30'), ('9','南通业务部-生产订单','1','31'), ('10','南通仓库-出入库流水','1','32'), ('11','南通仓库-库存统计-查询','1','33'), ('12','南通物流-装车管理','1','34'), ('13','南通物流-南通代发','1','35'), ('14','采购管理-采购管理','1','50'), ('15','会员管理-客户统计','1','60'), ('16','会员管理-供应商统计','1','61'), ('17','管理员管理-角色设置','1','62'), ('18','管理员管理-成员设置','1','63'), ('19','苏州业务部-所有订单','1','17'), ('24','统计管理-月销统计','1','70'), ('23','采购管理-南通物流','1','54'), ('21','采购管理-采购财务','1','52'), ('26','苏州仓库-库存统计-增删改','1','18'), ('27','南通仓库-库存统计-增删改','1','36'), ('20','采购管理-苏州物流','1','51'), ('25','统计管理-销量排行','1','71'), ('28','采购管理-采购查询','1','55'), ('30','苏州业务部-财务收款','1','19'), ('22','采购管理-申请采购','1','53'), ('29','南通业务部-南通备货','1','36');
INSERT INTO `erp_order_details` VALUES ('13','8','10-11','55','55','55','55','55','5','55.00','55','0'), ('14','8','11-14','77','77','77','88','88','7','88.00','88','0'), ('15','9','11-14','77','77','77','88','88','7','88.00','88','0');
INSERT INTO `erp_order_fh` VALUES ('1','8','以马内利发货单','2018-02-28 18:30:57','床垫','','admin','1','以马内利','安能物流19999999999','18888888888','月结','1','3','2018-02-28 20:05:52','2018-02-28 20:30:32','891.00');
INSERT INTO `erp_order_info` VALUES ('8','1','以马内利','床垫','2018-02-27 20:53:25','2018-02-28','苏州市相城区澄波路458号星星云电商商城','月结','891.00','-','2','0','1','0.00','0000-00-00 00:00:00'), ('9','2','张三','床垫','2018-02-27 20:56:51','2018-02-28','苏州市相城区澄波路458号星星云电商商城','月结','616.00','-','0','0','1','0.00','0000-00-00 00:00:00');
INSERT INTO `erp_order_sc` VALUES ('1','南通床垫生产单','床垫','2018-01-04 19:12:02','0000-00-00 00:00:00','','admin','1');
INSERT INTO `erp_order_yh` VALUES ('1','苏州要货单','床垫','2018-01-04 19:08:01','','admin','1','0000-00-00 00:00:00');
INSERT INTO `erp_role` VALUES ('1','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30','超级管理员','1'), ('2','1,19','采购员','0'), ('3','1,2,3,4,5,6','仓库管理员','0'), ('9','14,16','采购','1'), ('8','8,9,10,11,12,13,22,23','生产主管','1'), ('6','3,4,5,6,20','库管','1'), ('4','1,2,3,4,5,6,7,19,8,9,10,11','接单','0'), ('5','1,2,4,6,19,15','接单','1'), ('7','7,21','财务','1');
INSERT INTO `erp_system` VALUES ('siteName','以马内利生产进销存系统');
