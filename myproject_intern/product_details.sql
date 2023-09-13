
-- Create table
CREATE TABLE `categoryTable` (
  `sl_no` int(20) NOT NULL AUTO_INCREMENT,
  `dept` varchar(255) NOT NULL,
  `doc_type` varchar(255) NOT NULL,
  `ctg` varchar(255) NOT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table `categoryTable`
INSERT INTO `categoryTable` (`sl_no`, `dept`, `doc_type`, `ctg`) VALUES
(1, 'Electrical', 'Maintenance Manual', 'Brake'),
(2, 'Electrical', 'User Manual', 'Coupler'),
(3, 'Electrical', 'Presentations', 'ICF'),
(4, 'Electrical', 'Videos', 'ICF'),
(5, 'Electrical', 'Drawings', 'Coupler'),
(6, 'Mechanical', 'Maintenane Manual', 'Gangway'),
(7, 'Mechanical', 'User Manual', 'Trainset'),
(8, 'Mechanical', 'Specifications', 'Trainset Bogie'),
(9, 'Mechanical', 'Specifications', 'Door'),
(10,'Mechanical', 'Drawings', 'HVAC');
(11,'Mechanical', 'Drawings', 'Brake');
(12,'Mechanical', 'Videos', 'Brake');
(13, 'Stores', 'VB Stores Manual', 'Stores Item');

-- Indexes for dumped tables
ALTER TABLE `categoryTable`
  ADD PRIMARY KEY (`sl_no`);
