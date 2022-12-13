# Tìm hiểu về SOLID#
1. Đây là những nguyên tắc cơ bản mà lập trình viên cần nắm

2. Tìm hiểu

	a. S -Single-responsibility principle

		Một lớp chỉ nên làm một nhiệm vụ duy nhất. Lỡ có việc gì cần sửa thì chỉ cần lôi class đó ra sửa, mà không cần phải lo nó đụng chạm đến những phần khác.
	
	b. O -Open - closed principle

		Class đã viết r thì đừng sửa, nếu viết thêm chức năng thì tạo class mới kế thừa class cũ và add chức năng mình muốn vào 
	
	c. L - Liskov substitution principle

		Class con có thể thay thế class cha mà không thay đổi tính đúng đắn của chưong trình, Nếu thay đổi thì sai .

	d. I - Interface segregation principle

		Nên chia nhỏ các interface với những mục đích cụ thể khác nhau, Nếu gộp lại thì khi implement sẽ  bị dư thừa một vài function

	e. D - Dependency Inversion Principle 
		
		Các class nên giao tiếp với nhau qua interface hoặc abtract class vì đây nơi chứa những cái chung nhất và ít biến đổi nhất, sẽ dễ dàng code và sửa hơn
		
