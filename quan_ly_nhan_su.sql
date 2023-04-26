-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2023 lúc 07:16 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_nhan_su`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `classrooms`
--

INSERT INTO `classrooms` (`id`, `room_id`, `course_id`, `day`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'Thứ ba', '10:49:00', '10:51:00', 1, '2023-04-25 10:57:23', '2023-04-25 10:57:23'),
(2, 2, 6, 'Thứ ba', '02:28:00', '11:34:00', 1, '2023-04-25 11:29:02', '2023-04-25 11:29:02'),
(3, 2, 7, 'Thứ ba', '10:49:00', '02:53:00', 1, '2023-04-26 09:48:59', '2023-04-26 09:48:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `salary` decimal(12,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `description`, `salary`, `start_date`, `end_date`, `employee_id`, `contract_type_id`, `created_at`, `updated_at`) VALUES
(24, 'Hợp đồng lao động chính thức', '$description', '10000000.00', '2023-04-29', '2023-04-15', 24, 1, '2023-04-25 04:27:10', '2023-04-25 04:27:10'),
(25, 'Hợp đồng lao động chính thức', '$description', '13300000.00', '2023-05-03', '2023-04-26', 25, 1, '2023-04-25 04:27:49', '2023-04-25 04:27:49'),
(26, 'Hợp đồng lao động chính thức', '$description', '10000000.00', '2023-04-26', '2023-04-21', 26, 1, '2023-04-26 02:55:38', '2023-04-26 02:55:38'),
(27, 'Hợp đồng lao động chính thức', '$description', '10000000.00', '2023-04-29', '2023-04-18', 27, 1, '2023-04-26 02:56:01', '2023-04-26 02:56:01'),
(28, 'Hợp đồng thử việc', '$description', '9000000.00', '2023-04-13', '2023-04-30', 28, 1, '2023-04-26 02:56:37', '2023-04-26 02:56:37'),
(30, 'Hợp đồng lao động chính thức', '$description', '10000000.00', '2023-04-14', '2023-04-02', 30, 1, '2023-04-26 04:50:27', '2023-04-26 04:50:27'),
(31, 'Hợp đồng lao động chính thức', '$description', '10000000.00', '2023-04-22', '2023-04-10', 31, 1, '2023-04-26 04:50:57', '2023-04-26 04:50:57'),
(32, 'Hợp đồng lao động chính thức', '$description', '10000000.00', '2023-04-28', '2023-04-13', 32, 1, '2023-04-26 04:52:50', '2023-04-26 04:52:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contract_types`
--

CREATE TABLE `contract_types` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hợp đồng lao động chính thức', 'Hợp đồng lao động chính thức', '2023-04-13 08:41:16', '2023-04-13 08:41:16'),
(2, 'Hợp đồng thử việc', 'Hợp đồng thử việc', '2023-04-13 08:42:19', '2023-04-13 08:49:51'),
(3, 'Hợp đồng thực tập', 'Hợp đồng thực tập', '2023-04-13 08:42:19', '2023-04-13 08:49:56'),
(4, 'Hợp đồng thời vụ', 'Hợp đồng thời vụ', '2023-04-13 08:42:19', '2023-04-13 08:50:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `course_duration` int(11) NOT NULL,
  `status` varchar(191) DEFAULT 'Đang mở',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `avatar`, `start_date`, `end_date`, `course_duration`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Test', 'Mô tả khóa học', '1682388460PTHTTT-Biểu đồ thành phần.drawio (1).png', '2023-04-14', '2023-04-14', 3, 'Đang mở', '2023-04-25 02:07:40', '2023-04-25 02:07:40'),
(6, 'Lập trình PHP', 'Mô tả khóa học', '1682396890PTHTTT-Biểu đồ thành phần.drawio.png', '2023-04-07', '2023-03-29', 3, 'Đang mở', '2023-04-25 04:28:10', '2023-04-25 04:28:10'),
(7, 'Lập trình NodeJS', 'Mô tả khóa học', '1682396918PTHTTT-Quản lý sản phẩm.drawio (1).png', '2023-03-26', '2023-05-19', 3, 'Đang mở', '2023-04-25 04:28:38', '2023-04-25 04:28:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', 'Marketing', 1, '2023-04-13 09:06:29', '2023-04-13 09:06:29'),
(2, 'Công nghệ', 'Công nghệ', 1, '2023-04-13 09:07:33', '2023-04-13 09:07:33'),
(3, 'Kinh doanh', 'Kinh doanh', 1, '2023-04-13 09:07:33', '2023-04-13 09:07:33'),
(4, 'Kế toán', 'Kế toán', 1, '2023-04-13 09:07:33', '2023-04-13 09:07:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(191) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `name`, `birth_date`, `gender`, `address`, `tel`, `email`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Test', '2023-04-03', 'Nam', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682396829Công việc của Stakeholder.png', 'nhân viên mới', 1, '2023-04-25 04:27:09', '2023-04-25 04:27:09'),
(25, 'hoàng', '2023-04-07', 'Nam', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682396868middleware.jpg', 'nhân viên mới', 1, '2023-04-25 04:27:48', '2023-04-25 04:27:48'),
(26, 'toàn ngọc đoàn', '2023-03-28', 'Nam', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682477738PTHTTT-biểu đồ lớp.drawio.png', 'nhân viên mới', 1, '2023-04-26 02:55:38', '2023-04-26 02:55:38'),
(27, 'Thành tít', '2023-04-06', 'Nam', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682477760loi-ich-vay-tien-momo-1.png', 'nhân viên mới', 1, '2023-04-26 02:56:00', '2023-04-26 02:56:00'),
(28, 'trọng phan', '0000-00-00', 'Nam', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682477797PTHTTT-sơ đồ quy trình tt momo.drawio.png', 'nhân viên mới', 1, '2023-04-26 02:56:37', '2023-04-26 02:56:37'),
(30, 'test', '2023-03-27', 'Khác', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682484626ngoc xinh.jpg', 'nhân viên mới', 1, '2023-04-26 04:50:26', '2023-04-26 04:50:26'),
(31, 'nv1', '2023-04-05', 'Nữ', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682484657PTHTTT-Sơ đồ tổng quan hệ thống.jpg', 'nhân viên mới', 1, '2023-04-26 04:50:57', '2023-04-26 04:50:57'),
(32, 'hiếu', '2023-04-04', 'Nam', 'Hà nội', '0989998989', 'qlns@gmail.com', '1682484770ngoc xinh.jpg', 'nhân viên mới', 1, '2023-04-26 04:52:50', '2023-04-26 04:52:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee_courses`
--

CREATE TABLE `employee_courses` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 1,
  `score` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `employee_courses`
--

INSERT INTO `employee_courses` (`id`, `employee_id`, `course_id`, `status`, `score`, `created_at`, `updated_at`) VALUES
(16, 27, 6, 1, NULL, '2023-04-26 04:28:54', '2023-04-26 04:28:54'),
(21, 26, 6, 1, 10, '2023-04-26 04:54:02', '2023-04-26 04:57:25'),
(23, 28, 7, 1, NULL, '2023-04-26 04:56:30', '2023-04-26 04:56:30'),
(24, 28, 7, 1, NULL, '2023-04-26 04:56:35', '2023-04-26 04:56:35'),
(25, 25, 6, 1, 10, '2023-04-26 05:03:15', '2023-04-26 05:07:33'),
(27, 25, 6, 1, 10, '2023-04-26 05:04:55', '2023-04-26 05:07:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `education_name` varchar(50) DEFAULT NULL,
  `position_name` varchar(191) DEFAULT NULL,
  `department_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_id`, `education_name`, `position_name`, `department_name`, `created_at`, `updated_at`) VALUES
(25, 24, '$educationName', 'Lập trình viên', 'Công nghệ', '2023-04-25 04:27:10', '2023-04-25 04:27:10'),
(26, 25, '$educationName', 'Tester', 'Công nghệ', '2023-04-25 04:27:48', '2023-04-25 04:27:48'),
(27, 26, '$educationName', 'Trưởng phòng', 'Marketing', '2023-04-26 02:55:38', '2023-04-26 02:55:38'),
(28, 27, '$educationName', 'Trưởng phòng', 'Kế toán', '2023-04-26 02:56:00', '2023-04-26 02:56:00'),
(29, 28, '$educationName', 'Tester', 'Công nghệ', '2023-04-26 02:56:37', '2023-04-26 02:56:37'),
(31, 30, '$educationName', 'Trưởng phòng', 'Kế toán', '2023-04-26 04:50:27', '2023-04-26 04:50:27'),
(32, 31, '$educationName', 'Trưởng phòng', 'Marketing', '2023-04-26 04:50:57', '2023-04-26 04:50:57'),
(33, 32, '$educationName', 'kế toán viên', 'Kế toán', '2023-04-26 04:52:50', '2023-04-26 04:52:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Lập trình viên', NULL, 2, '2023-04-13 09:07:59', '2023-04-13 09:07:59'),
(2, 'Tester', NULL, 2, '2023-04-13 09:08:39', '2023-04-13 09:08:53'),
(3, 'Business Analyst', NULL, 2, '2023-04-13 09:08:39', '2023-04-13 09:09:00'),
(44, 'Trưởng phòng', 'Trưởng phòng', 1, '2023-04-20 11:33:04', '2023-04-20 11:33:04'),
(45, 'Trưởng phòng', NULL, 4, '2023-04-20 11:33:15', '2023-04-20 11:33:15'),
(46, 'Sale Member', 'Sale Member', 3, '2023-04-26 04:51:43', '2023-04-26 04:51:43'),
(47, 'Sale Leader', 'Sale Leader', 3, '2023-04-26 04:51:53', '2023-04-26 04:51:53'),
(48, 'Trưởng phòng', 'Sale Leader', 3, '2023-04-26 04:52:09', '2023-04-26 04:52:09'),
(49, 'kế toán viên', 'kế toán viên', 4, '2023-04-26 04:52:28', '2023-04-26 04:52:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Local-admin', 'admin', 1, '2023-04-12 15:10:46', '2023-04-12 15:10:46'),
(2, 'standard-user', 'standard-user', 1, '2023-04-13 04:31:24', '2023-04-13 04:31:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `place`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Phòng 101', 'Tòa V', 1, '2023-04-25 09:44:19', '2023-04-25 09:44:19'),
(2, 'Phòng 102', 'Tòa V', 1, '2023-04-25 09:44:57', '2023-04-25 09:44:57'),
(3, 'Phòng 201', 'Tòa C', 1, '2023-04-25 09:44:57', '2023-04-25 09:44:57'),
(4, 'Phòng 301', 'Tòa G', 1, '2023-04-25 09:44:57', '2023-04-25 09:44:57'),
(5, 'Phòng 304', 'Tòa F', 1, '2023-04-25 09:44:57', '2023-04-25 09:44:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `status`, `role_id`) VALUES
(7, 'Local Admin', 'local-admin@gmail.com', '4a3825c9247765c50463702745d4ede7', '', '2023-04-12 17:03:00', '2023-04-12 17:03:00', 1, 1),
(8, 'Toan Ngoc Doan', 'toannd158@gmail.com', '4a3825c9247765c50463702745d4ede7', '', '2023-04-12 17:09:39', '2023-04-12 17:09:39', 1, 2),
(16, 'toàn ngọc đoàn', 'toandaika123@gmail.com', '4a3825c9247765c50463702745d4ede7', '', '2023-04-20 07:22:17', '2023-04-20 07:22:17', 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course` (`course_id`),
  ADD KEY `fk_room` (`room_id`);

--
-- Chỉ mục cho bảng `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `fk_contract` (`contract_type_id`);

--
-- Chỉ mục cho bảng `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employee_courses`
--
ALTER TABLE `employee_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employee_courses_employee` (`employee_id`),
  ADD KEY `fk_employee_courses_courses` (`course_id`);

--
-- Chỉ mục cho bảng `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_position` (`department_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_role_user` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `employee_courses`
--
ALTER TABLE `employee_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_contract` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contract_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employee_courses`
--
ALTER TABLE `employee_courses`
  ADD CONSTRAINT `fk_employee_courses_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_courses_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `fk_employee_detail` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `fk_position` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
