create table ali_cate(
cate_id int unsigned primary key auto_increment,
cate_name varchar(10) unique key not null,
cate_slug varchar(10) unique key not null,
cate_class varchar(10) unique key not null,
cate_status tinyint(4) not null default 1,
cate_show tinyint(4) not null default 1  
);

insert into ali_cate values
	(null, '奇趣事', 'qqs', 'fa-class', 1, 1),
	(null, '会生活', 'hsh', 'fa-fire', 1, 1),
	(null, '美奇迹', 'mqj', 'fa-gift', 1, 1);
	(null, '潮科技', 'tec', 'fa-phone', 1, 1);


create table ali_user (
user_id int primary key auto_increment,
user_email varchar(30) unique key not null comment '用户名',
user_slug varchar(30) unique key not null comment '用户别名',
user_nickname varchar(30) unique key not null comment '用户昵称',
user_password char(32) not null comment '用户密码,md5加密',
user_pic varchar(100) not null comment '用户头像',
user_state tinyint not null default 1 comment '用户状态 1 激活 2 未激活'
);


insert into ali_user values 
	(null, 'skhds@163.com', 'skhds', '帅哥', '143224', 'hashihfiugfiagfsufgs', '1'),
	(null, 'qwe@163.com', 'qwe', '美女', '153265', 'hashidfgdfgdfbdbg', '0'),
	(null, 'sdf@163.com', 'sdfs', '大黄', '147298', 'hashihgdgdefgddffd', '1'),
	(null, 'cvb@163.com', 'cvb', '阿牛', '143526', 'hashiafsdgdegde', '0'),
	(null, 'bnm@163.com', 'bnm', '小郭', '142214', 'hasadfsfsdfd', '1'),
	(null, 'ghj@163.com', 'ghj', '马哥', '183722', 'hashihfiugfjffghf', '0'),
	(null, 'rty@163.com', 'rty', '刘大', '153124', 'hashihfsadsasda', '1'),
	(null, 'gyh@163.com', 'gyh', '赵二', '149220', 'hbjksdakbajsbv', '0');


create table ali_post (
post_id int unsigned primary key auto_increment,
post_title varchar(30) unique key not null comment '文章标题',



post_slug varchar(30) unique key not null comment '文章别名',
post_desc varchar(255) not null comment '文章摘要',
post_content text not null comment '文章内容',
post_author int not null comment '作者id, 和user_id字段关联',
post_cateid int not null comment '分类id, 和cate_id字段关联',
post_file varchar(100) not null default '1' comment '封面图片',
post_addtime int unsigned not null comment '文章发布时间',
post_updtime int unsigned not null comment '文章修改时间',
post_click int unsigned not null comment '点击量',
post_good int unsigned not null comment '赞数量',
post_bad int unsigned not null comment '踩数量',

post_state enum('草稿', '已发布') not null default '草稿' comment '文章状态'

post_hot enum('推荐', '非推荐') not null default '推荐' comment '热搜',
);




// 联查的sql语句
select post_id, post_title, user_nickname, cate_name, post_updtime, post_state from ali_post p 
join ali_user u on p.post_author=u.user.id
join ali_cate c on p.post_cateid=c.cate.id;





select * from users
join lev on user.level=lev.lid;


select * from users
join dept on dept.deptid=dept.did;


select users.*, dept.dname, lev.lname from users
join dept on users.deptid=dept.did
join lev on users.level=lev.lid;





select post_id, post_title, user_nickname, cate_id, cate_name, post_updtime, post_state from ali_post p
join ali_user u on p.post_author = u.user_id
join ali_cate c on p.post_cateid = c.cate_id
where cate_id = 2 and post_state = 1

select post_id, post_title, user_nickname, cate_id, cate_name, post_updtime, post_state from ali_post p
join ali_user u on p.post_author = u.user_id
join ali_cate c on p.post_cateid = c.cate_id
where cate_id = 1 and post_state = 1 and 1 limit ($pageno - 1) * $pagesize,$pagesize;


select post_id, post_title, user_nickname, cate_id, cate_name, post_updtime, post_state from ali_post p
join ali_user u on p.post_author = u.user_id
join ali_cate c on p.post_cateid = c.cate_id
where cate_id = 1 and post_state = 1 and 1 limit ($pageno - 1) * $pagesize,$pagesize;


create table ali_member (
member_id int unsigned auto_increment primary key,
member_name varchar(30) unique key not null comment '会员名，用来登录',
member_nickname varchar(30) unique key not null comment '会员昵称',
member_pwd char(32) not null comment '会员密码'
);

create table ali_comment (
cmt_id int(10) unsigned auto_increment primary key,
cmt_content varchar(200) not null comment '评论内容',
cmt_memid int(10) unsigned not null comment '评论人id，与member 表中的member_id一致',
cmt_userid int(10) unsigned not null comment '审核人id，和user表中的user_id一致',
cmt_postid int(10) unsigned not null comment '评论文章id，和post表中的post_id对应',
cmt_time int(10) unsigned not null comment '评论时间',
cmt_state enum('批准', '驳回') not null default '驳回'
);

insert into ali_comment values
	
	(null, '666', '2', '3','2','1354854565','驳回'),
	(null, '哈哈哈哈', '1', '3','2','1236548545','驳回'),
	(null, '嘿嘿嘿', '3', '4','4','1526354853','批准'),
	(null, '城会玩', '3', '5','3','1356415622','驳回');

insert into ali_member values
	(null, 'lufei', '路飞', '12345'),
	(null, 'namei', '娜美', '12345'),
	(null, 'qiaoba', '乔巴', '12345'),
	(null, 'suolong', '索隆', '12345'),
	(null, 'shanzhi', '山治', '12345');

insert into ali_comment values
(null, '非常好！！！！！', '1', '2','1','1256849521','驳回'),	
(null, '城里人太会玩了', '3', '5','3','1356415622','批准'),
(null, '嘿嘿嘿！！！！！', '1', '2','1','1256849521','驳回'),	
(null, '哈哈哈哈', '3', '5','3','1356415622','批准');


create table ali_pic (
	pic_id int unsigned auto_increment primary key,
	pic_path varchar(100) not null comment '上传文件保存',
	pic_txt varchar(20) not null comment '文本标题',
	pic_link varchar(20) not null comment '文章链接地址',
	pic_state enum('显示', '不显示') not null default '不显示'
);

