-- Đồ án tốt nghiệp --

1. Tạo 1 trang web trong đó bao gồm

1.1. Admin

-- danh sách sản phẩm -- items

-- tồn kho -- warehouses

-- đơn vị tính: -- units

-- chính sách khuyến mại: SaleDiscount

    -- tặng kèm:

    -- 

    --

-- giá bán hiện thời: --

-- hoá đơn bán lẻ: SaleRetails

-- hoá đơn chi tiết bán  lẻ: SaleRetailDetails

2.1. Web

Show sản phẩm và các thông tin tặng kèm ở trang danh sách


------- Các bảng trong database

1. Item: 
id, code, name, unit, isactive, createBy, CreatedAt, ModifiedBy, ModifiedAt

2. Units
id, Code, Description, isactive, createBy, CreatedAt, ModifiedBy, ModifiedAt

3. Warehouse: 
id, code, name, address, isactive, createBy, CreatedAt, ModifiedBy, ModifiedAt

4. Policies
id, code, name, description, docdate, docno, startdate. enddate, đối tượng áp dụng (cửa hàng nào), vùng

5. policyDetails -- bảng chi tiết
id, PolicyId, EffectiveDate, ItemId, ItemName, Unit, GiftItemId, GiftQuantity, MaxGiftQuantity



---- Các công việc

1. Quản lý vật tư: OKE

2. Xử lý phần tạo chính sách 
2.1. Hoàn thiện form thêm mới ok
.... chưa xong
-> nghĩ cách xử lý phần dưới lưới

2.2. Xử lý phần thêm mới chính sách

-> Tạo form thành công OK
-> Tạo Ajax để lấy res từ api: tham khảo qlns ok
-> tìm hiểu lại cách hiển thị
-> Show màn hình
-> 



3. Hoàn thiện phần xử lý luật
3.1. Tạo luật vào đầu vào, đầu ra -> Hiện tại chỉ xử lý từ file Excel
3.2. Suy cách đưa vào database
3.3. 
3.4. Fix lỗi không bắt được sự kiện khi add html từ js vào

Sau khi hoàn thiện. viết một API gọi luật -> req: itemId, res giftId ok 