var obj_country = document.querySelector('#country');
//B2 lấy sự kiện
obj_country.addEventListener('change', function() {
    //lấy thuốc tính value của obj hiện tại
    // var val= obj_country.value;
    //có thể sử dụng this thay thế khi đag tham chiếu đến cùng obj hiện tại
    var val = this.value;
    //alert(val);
    //lấy text bên  trong option:
    var text = this.options[this.selectedIndex].text;
    alert(text);
});

var obj_h4= document.querySelector('.h4-click');
//B2 tạo sự kiện
obj_h4.addEventListener('click', function() {
    alert('đã thêm vào giỏ hàng ');
});
// luôn cần phải đảm bảo code js chạy sau sùng, chạy sau khi html css hiển thị xong
var obj_submit