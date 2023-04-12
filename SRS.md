<!-- Đồ án quản lý nhân sự -->

<!-- Các chức năng như sau: -->
1. Quản lý nhân viên (CRUD)
2. Quản lý chương trình đào tạo


<!-- Quản lý chương trình đào tạo -->
2.1 CRUD
2.2 Giao các nhân viên các khóa học hoặc các nhân viên có chức năng đăng ký khóa học



<!-- Xây dựng database -->

1. tbl_employees
    id, employee_name, birth_date, gender, address, tel, email, avatar, description, status

2. tbl_position
    id, position_name, department_id, 

4. tbl_educations 
    id, education_name, 

5. tbl_departments
    id, department_name

6. tbl_contracts
    id, contract_name

<!-- 1 nhân viên chỉ có 1 thông tin chi tiết -->
7. tbl_employee_details
    id, employee_id, education_name, position_name, department_name, contract_name, start_date, end_date

<!-- 1 nhân viên chỉ có 1 account -->
8. tbl_users
    id, email, password, role_id, status 

9. tbl_roles
    id, role_name, description, status

10. tbl_courses
    id, name, description, avatar, start_date, end_date, course_duration, status(Đang mở, đầy, kết thúc)

11. tbl_employee_courses
    id, employee_id, course_id, status(đang chờ, đã đăng ký, đã hoàn thành), score (nếu có)

12. tbl_course_feebacks
    id, employee_id, course_id, comment, image

13. tbl_feedback_images
    id, course_feedback_id, name_image, path_image