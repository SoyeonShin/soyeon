//1
create database college;
	use college;

	Create TABLE student(
		student_id INTEGER primary key not null,
		name varchar(10) not null,
		year tinyint(4) default "1" not null,
		dept_no INTEGER not null,
		major varchar(20)
	);

	Create TABLE department(
		dept_no integer primary key auto_increment not null,
		dept_name varchar(20) not null unique,
		office varchar(20) not null,
		office_tel varchar(13)
	);

	alter table student modify column major varchar(30);
	desc student;
//2
	alter table student drop column gender;

	insert into student values(20070002,'송은이', 3, 4, '경영학');
	insert into student values(20060001,'박미선', 4, 4, '경영학');
	insert into student values(20030001,'이경규', 4, 2, '전자공학');
	insert into student values(20040003,'김용만', 3, 2, '전자공학');
	insert into student values(20060002,'김국진', 3, 1, '컴퓨터공학');
	insert into student values(20100002,'한선화', 3, 4, '경영학');
	insert into student values(20110001,'송지은', 2, 1, '컴퓨터공학');
	insert into student values(20080003,'전효성', 4, 3, '법학');
	insert into student values(20040002,'김구라', 4, 5, '영문학');
	insert into student values(20070001,'김숙', 4, 4, '경영학');
	insert into student values(20100001,'황광희', 3, 4, '경영학');
	insert into student values(20110002,'권지용', 2, 1, '전자공학');
	insert into student values(20030002,'김재진', 5, 1, '컴퓨터공학');
	insert into student values(20070003,'신봉선', 4, 3, '법학');
	insert into student values(20070005,'김신영', 2, 5, '영문학');
	insert into student values(20100003,'임시환', 3, 1, '컴퓨터공학');
	

	insert into department (dept_name, office, office_tel)
		values('컴퓨터공학', '이학관 101호', '02-3290-0123');
	insert into department (dept_name, office, office_tel)
		values('전자공학', '공학관 401호', '02-3290-2345');
	insert into department (dept_name, office, office_tel)
		values('법학', '법학관 201호', '02-3290-7896');
	insert into department (dept_name, office, office_tel)
		values('경영학', '경영관 104호','02-32990-1112');
	insert into department (dept_name, office, office_tel)
		values('영문학','문화관303호','02-3290-4412');
//3
	update department set dept_name="전자전기공학" where dept_name="전자공학";
	insert into department(dept_name, office, office_tel)
		values ('특수교육학과','공학관 403호','02-3290-2347');
	//송지은 이동
	insert into student values(20110001,'송지은', 2, 1, '특수교육학과');
	delete from student where name="권지용";
	delete from student where name="김재진";

//4
	select * from student where major="컴퓨터공학";
	select student_id, year, major from student;
	select * from student where year=3;
	select * from student where year=1 or year=2;
	select * from student s join department d onn s.dept_no=d.dept_no
	where dept_name="경영학과";

//5
	select * from student where student_id like '2007%';
	select * from student order by student_id;
	select major from student group by major having avg(year)>3;
	select * from student where major="경영학과" where student_id like "2007%" limit 2;

//6
	select r.role
	from roles r
	join movies m on r.movie_id=m.id
	where m.name="Pi";

	select distinct a.first_name, a.last_name
	from actors a
	join roles r on a.id=r.actor_id
	join movies m on m.id=r.movie_id
	group by a.id
	having count(a.id)> any (select count(a.id) from actors a
	join roles r on a.id=r.actor_id
	join movies m on m.id=r.movie_id
	group by a.id)
	order by count(a.id) desc
	limit 7;

