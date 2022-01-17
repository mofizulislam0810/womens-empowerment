-- Database: `final`


-- Table structure for table `tutorial`


CREATE TABLE `tutorial` (
  `id` int(5) NOT NULL auto_increment,
  `date` varchar(55) NOT NULL,
  `author` varchar(75) NOT NULL,
  `title` varchar(200) NOT NULL,  
  `images` text NOT NULL,
  `content` varchar(5000) NOT NULL,
  `type` varchar(200) NOT NULL, 
  PRIMARY KEY  (`id`)
)



-- Table structure for table `post`



CREATE TABLE `post` (
  `id` int(5) NOT NULL auto_increment,
  `date` varchar(55) NOT NULL,
  `author` varchar(75) NOT NULL,
  `title` varchar(75) NOT NULL,  
  `images` text NOT NULL,
  `content` varchar(5000) NOT NULL,
  PRIMARY KEY  (`id`)
)
-- Table structure for table `blog`


CREATE TABLE `blog` (
  `id` int(5) NOT NULL auto_increment,
  `date` varchar(55) NOT NULL,
  `author` varchar(75) NOT NULL,
  `title` varchar(75) NOT NULL,  
  `images` text NOT NULL,
  `content` varchar(5000) NOT NULL,
  PRIMARY KEY  (`id`)
)

-- Table structure for table `user`

CREATE TABLE `user` (
  `id` int(5) NOT NULL auto_increment,
  `date` varchar(55) NOT NULL,
  `fullname` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `role` varchar(90) NOT NULL,
  PRIMARY KEY  (`id`)
)



-- Table structure for table `comment`
CREATE TABLE `comment` (
  `id` int(5) PRIMARY KEY auto_increment,
  `date` varchar(55) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  post_id_fk INT,
  FOREIGN KEY(post_id_fk) REFERENCES tutorial(id)
)

