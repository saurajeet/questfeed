create table rssdata
(   guid int(10) primary key auto_increment,   
    title varchar (100),
    author varchar(100),
    link varchar(500),
    description varchar (500),
    pubDate varchar (50),
    source varchar(100),
    sourceurl varchar(500)
);