CREATE TABLE `categories` (
 `cat_id` int(11) NOT NULL AUTO_INCREMENT,
 `cat_title` varchar(255) NOT NULL,
 PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4

CREATE TABLE `post` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES (NULL, '1', 'Hello world!', 'blu', '2020-11-11', '', 'Wow!', 'blu, hello, php', '0', 'draft');
