CREATE TABLE `categories` (
 `cat_id` int(11) NOT NULL AUTO_INCREMENT,
 `cat_title` varchar(255) NOT NULL,
 PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `posts` (
 `post_id` int(3) NOT NULL AUTO_INCREMENT,
 `post_category_id` int(11) NOT NULL,
 `post_title` varchar(255) NOT NULL,
 `post_author` varchar(255) NOT NULL,
 `post_date` date NOT NULL,
 `post_image` text NOT NULL,
 `post_content` text NOT NULL,
 `post_tags` varchar(255) NOT NULL,
 `post_comment_count` int(11) NOT NULL,
 `post_status` varchar(255) NOT NULL DEFAULT 'draft',
 PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES (NULL, '1', 'Hello world!', 'blu', '2020-11-11', '', 'Wow!', 'blu, hello, php', '0', 'draft');

CREATE TABLE `comments` (
   `comment_id` INT(3) NOT NULL AUTO_INCREMENT,
   `comment_post_id` INT(3) NOT NULL,
   `comment_author` VARCHAR(255) NOT NULL,
   `comment_email` VARCHAR(255) NOT NULL,
   `comment_content` TEXT NOT NULL,
   `comment_status` VARCHAR(255) NOT NULL,
   `comment_date` DATE NOT NULL,
   PRIMARY KEY  (`comment_id`)
 ) ENGINE = InnoDB;

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES (NULL, '4', 'blu', 'blu@email.com', 'test content.', '', '2020-12-10');

CREATE TABLE users` (
   `user_id` INT(3) NOT NULL AUTO_INCREMENT ,
   `username` VARCHAR(255) NOT NULL ,
   `user_password` VARCHAR(255) NOT NULL ,
   `user_firstname` VARCHAR(255) NOT NULL ,
   `user_lastname` VARCHAR(255) NOT NULL ,
   `user_email` VARCHAR(255) NOT NULL ,
   `user_image` TEXT NOT NULL ,
   `user_role` VARCHAR(255) NOT NULL ,
   `randSalt` VARCHAR(255) NOT NULL ,
   PRIMARY KEY (`user_id`)) ENGINE = InnoDB;

 INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES ('1', 'blu', '123', 'B.', 'Lu', 'blu@gmail.com', '', 'admin', '');
