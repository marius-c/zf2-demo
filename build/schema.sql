
--
-- Database: `zf2demo_library`
--
CREATE DATABASE IF NOT EXISTS `zf2demo_library` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `zf2demo_library`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `isbn`, `year`, `publisher`, `price`) VALUES
(1, 'Agile Principles, Patterns, and Practices in C#', 'With the award-winning book Agile Software Development: Principles, Patterns, and Practices, Robert C. Martin helped bring Agile principles to tens of thousands of Java and C++ programmers. Now .NET programmers have a definitive guide to agile methods with this completely updated volume from Robert C. Martin and Micah Martin, Agile Principles, Patterns, and Practices in C#.\r\n\r\nThis book presents a series of case studies illustrating the fundamentals of Agile development and Agile design, and moves quickly from UML models to real C# code. The introductory chapters lay out the basics of the agile movement, while the later chapters show proven techniques in action. The book includes many source code examples that are also available for download from the authorsâ€™ Web site.', '978-83-246-1177-5', 2006, 'Prentice Hall', 47.36),
(2, 'Software Development', 'Even the best developers have seen well-intentioned software projects fail -- often because the customer kept changing requirements, and end users didn''t know how to use the software you developed. Instead of surrendering to these common problems, let Head First Software Development guide you through the best practices of software development. Before you know it, those failed projects will be a thing of the past.\r\n\r\nWith its unique visually rich format, this book pulls together the hard lessons learned by expert software developers over the years. You''ll gain essential information about each step of the software development lifecycle -- requirements, design, coding, testing, implementing, and maintenance -- and understand why and how different development processes work.', '978-83-246-1547-6', 2008, 'O''Reilly Media', 32.48),
(3, 'Head First SQL', 'Is your data dragging you down? Are your tables all tangled up? Well we''ve got the tools to teach you just how to wrangle your databases into submission. Using the latest research in neurobiology, cognitive science, and learning theory to craft a multi-sensory SQL learning experience, Head First SQL has a visually rich format designed for the way your brain works, not a text-heavy approach that puts you to sleep.\r\n\r\nMaybe you''ve written some simple SQL queries to interact with databases. But now you want more, you want to really dig into those databases and work with your data. Head First SQL will show you the fundamentals of SQL and how to really take advantage of it. We''ll take you on a journey through the language, from basic INSERT statements and SELECT queries to hardcore database manipulation with indices, joins, and transactions. We all know "Data is Power" - but we''ll show you how to have "Power over your Data". Expect to have fun, expect to learn, and expect to be querying, normalizing, and joining your data like a pro by the time you''re finished reading!', '978-83-246-1445-5', 2007, 'O''Reilly Media', 31.66),
(4, 'Head First Object-Oriented Analysis & Design', 'Tired of reading Object Oriented Analysis and Design books that only makes sense after you''re an expert? You''ve heard OOA&D can help you write great software every time-software that makes your boss happy, your customers satisfied and gives you more time to do what makes you happy. But how?\r\nHead First Object-Oriented Analysis & Design shows you how to analyze, design, and write serious object-oriented software: software that''s easy to reuse, maintain, and extend; software that doesn''t hurt your head; software that lets you add new features without breaking the old ones.', '978-83-246-0965-9', 2006, 'O''Reilly Media', 40.07),
(5, 'Extending Symfony 2 Web Application Framework', 'With lots of practical, hands-on, step-by-step examples, this book will lead you through how to extend and optimize your Symfony2 framework.\r\n\r\nIf you have a good understanding of how Symfony works and are now trying to integrate complex tasks in your application, or want to better organize your application by keeping each piece of code where it belongs so it can be decoupled and easily used elsewhere, then this book is for you.', '978-17-832-8719-2', 2014, 'Packt Publishing', 31.49),
(6, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Even bad code can function. But if code isnâ€™t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code. But it doesnâ€™t have to be that way.\r\n\r\nNoted software expert Robert C. Martin presents a revolutionary paradigm with Clean Code: A Handbook of Agile Software Craftsmanship . Martin has teamed up with his colleagues from Object Mentor to distill their best agile practice of cleaning code â€œon the flyâ€ into a book that will instill within you the values of a software craftsman and make you a better programmerâ€”but only if you work at it.\r\n\r\nWhat kind of work will you be doing? Youâ€™ll be reading codeâ€”lots of code. And you will be challenged to think about whatâ€™s right about that code, and whatâ€™s wrong with it. More importantly, you will be challenged to reassess your professional values and your commitment to your craft.\r\n\r\nClean Code is divided into three parts. The first describes the principles, patterns, and practices of writing clean code. The second part consists of several case studies of increasing complexity. Each case study is an exercise in cleaning up codeâ€”of transforming a code base that has some problems into one that is sound and efficient. The third part is the payoff: a single chapter containing a list of heuristics and â€œsmellsâ€ gathered while creating the case studies. The result is a knowledge base that describes the way we think when we write, read, and clean code.', '000-01-323-5088-2', 2008, 'Prentice Hall', 38.85),
(7, 'Refactoring: Improving the Design of Existing Code', 'Refactoring is about improving the design of existing code. It is the process of changing a software system in such a way that it does not alter the external behavior of the code, yet improves its internal structure. With refactoring you can even take a bad design and rework it into a good one. This book offers a thorough discussion of the principles of refactoring, including where to spot opportunities for refactoring, and how to set up the required tests. There is also a catalog of more than 40 proven refactorings with details as to when and why to use the refactoring, step by step instructions for implementing it, and an example illustrating how it works The book is written using Java as its principle language, but the ideas are applicable to any OO language.', '978-02-014-8567-7', 1999, 'Addison-Wesley Professional', 48.33),
(8, 'Head First Design Patterns', 'Whatâ€™s so special about design patterns?\r\n\r\nAt any given moment, someone struggles with the same software design problems you have. And, chances are, someone else has already solved your problem. This edition of Head First Design Patternsâ€”now updated for Java 8â€”shows you the tried-and-true, road-tested patterns used by developers to create functional, elegant, reusable, and flexible software. By the time you finish this book, youâ€™ll be able to take advantage of the best design practices and experiences of those who have fought the beast of software design and triumphed.\r\n\r\nWhatâ€™s so special about this book?\r\n\r\nWe think your time is too valuable to spend struggling with new concepts. Using the latest research in cognitive science and learning theory to craft a multi-sensory learning experience, Head First Design Patterns uses a visually rich format designed for the way your brain works, not a text-heavy approach that puts you to sleep.', '978-05-960-0712-6', 2004, 'O''Reilly Media', 37.99);


--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `email`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin@zf2-demo.local', '$2y$10$f/mSA9WnIRem2IHLtQWjROgvchksKtJwwbx4aB8ga2xnnEOWbj66i');