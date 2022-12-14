# Tìm hiểu về  Design Pattern #

## Khái niệm ##
    Là những kỹ thuật trong lập trình hướng đối tượng
    Đây là những mẫu thiết kế mà các lấp trình viên đời trước đã mất rất nhiều thời gian và xương máu mới thiết kế ra. 
    Bản thân mình cũng có thể có giải pháp cho những cái issus của mình. Tuy nhiên có thể nó không tối ưu. 
## Phân loại ##
    Có 3 nhóm:  + Creational Patterns
                + Structural Patterns
                + Behavioral Patterns 
## Các loại Design Pattern phổ biến ##
    Trong phạm vi tài liệu này ta sẽ cùng đi qua tìm hiểu 4 loại:
    1. Factory Method
    2. Builder
    3. Facede
    4. Strategy

1. Factory Method
   
    a. Khái niệm

        Factory Pattern đúng nghĩa là một nhà máy, và nhà máy này sẽ “sản xuất” các đối tượng theo yêu cầu của chúng ta.
    b. Cài đặt

        Một Factory Pattern bao gồm các thành phần cơ bản sau:

        + Super Class: môt supper class trong Factory Pattern có thể là một interface, abstract class hay một class thông thường.
        + Sub Classes: các sub class sẽ implement các phương thức của supper class theo nghiệp vụ riêng của nó.
        + Factory Class: một class chịu tránh nhiệm khởi tạo các đối tượng sub class dựa theo tham số đầu vào. Lưu ý: lớp này là Singleton hoặc cung cấp một public static method cho việc truy xuất và khởi tạo đối tượng. Factory class sử dụng if-else hoặc switch-case để xác định class con đầu ra.
    c. Ví dụ
        
        Cấu hình file

    ```
    .
    ├── autoLoad.php
    ├── DrinkFactory.php
    ├── Drink.php
    ├── DrinkType.php
    ├── index.php
    └── Subclass
        ├── Coffee.php
        └── MilkTea.php
    ```
    ```
    File autoLoad: Tải content các file
    ```
    ```
    Drink.php 

    <?php
    namespace drink;
    interface Drink{
        function getName():string;
    }

    ?>
    Là 1 interface chứa 1 phương thức getName để các phương thức con kế thừa
    ``` 
    ```
    MilkTea.php

    <?php
    namespace subclass;
    use drink\Drink;

    class MilkTea implements Drink{
        function getName(): string
        {
            return "this is Milk tea";
        }
    }


    ?>
    Kế thừa từ Drink và overwrite getName
    Coffee thì tương tự như MilkTea
    ```
    ```
    DrinkType là 1 enum để  có thể dễ dàng thêm vào khi muốn tạo đồ  uống mới

    <?php
    namespace drink;
    enum DrinkType{
        case COFFEE;
        case MILKTEA;
        case BEER;

    }
    ?>
    ```

    ```
    DrinkFactory.php

    namespace drink;
    use subclass\Coffee;
    use subclass\MilkTea;
    use drink\DrinkType;

    class DrinkFactory{

        function __construct()
        {
            
        }
        public static final function getDrink($typeOfDrink){
            switch ($typeOfDrink) {
                case DrinkType::COFFEE :
                    return new Coffee;      
                case  DrinkType::MILKTEA:
                    return new MilkTea;        
                default:
                    return new MilkTea; 
                    
            }
        }
    }
    Khi khởi tạo sẽ là 1 một static và không được overwrite nhằm định nghĩa đầu ra khi bạn muốn tạo 1 instant 
    ```

    ```
    index.php
    <?php
    include_once "./autoLoad.php";

    use drink\DrinkFactory;
    use drink\DrinkType;
    $tea = DrinkFactory::getDrink(DrinkType::MILKTEA);
    echo $tea->getName();

    File này sẽ tạo 1 $tea không trực tiếp từ Tea mà sẽ tạo từ DrinkFactory
    ?>
    Result: this is Milk tea
    ```
2. Builder Design Pattern
    1. Định nghĩa 
   
       Builder pattern là một trong những Creational pattern. Builder pattern là mẫu thiết kế đối tượng được tạo ra để xây dựng một đôi tượng phức tạp bằng cách sử dụng các đối tượng đơn giản và sử dụng tiếp cận từng bước, việc xây dựng các đối tượng đôc lập với các đối tượng khác.
    2. Mục đích
   
        + Chủ động việc truyền giá trị cho các tham số
        + Code dễ đọc trong trường hợp có nhiều tham số truyền vào. Dùng cái nào thì gọi cái đó ra xài
        + Thêm rằng buộc lúc khởi tao đối tượng
    3. Triển khai

        ```
        ├── autoLoad.php
        ├── Builder.php
        ├── index.php
        ├── MilkTeaBuilder.php
        └── MilkTea.php
        ```
        ```
        Builder.php
        Khởi tạo 1 interface có các phương thức cần dùng mà các class implement cần phải có

        <?php 
        namespace builder;


        interface Builder{
            public function setMilk($milkType);
            public function setTea($tea);
            public function setTemperature(int $temp);
            public function setHavePearl(bool $color);
            public function setHavePlankCake(bool $plank);
            public function setSize($size);
            public function build();
        }

        ?>
        ```
        ```
        MilkTeaBuilder implement từ Builder
        <?php
        namespace build;
        use builder\Builder;
        use build\MilkTea;

        class MilkTeaBuilder implements Builder{
            private $size;
            private $havePlankCake;
            private $temperate;
            private $havePearl;
            private $milk;
            private $tea;

            public function setSize($size)
            {
                $this->size=$size;
                return $this;
            }
            public function setHavePlankCake(bool $plank)
            {
                $this->havePlankCake = $plank;
                return $this;
            }
            public function setHavePearl(bool $pearl)
            {
                $this->havePearl= $pearl;
                return $this;
            }
            public function setTemperature(int $temp)
            {
                $this->temperate=$temp;
                return $this;
            }
            public function setMilk($milk)
            {
                $this->milk = $milk;
                return $this;
            }
            public function setTea($tea)
            {
                $this->tea=$tea;
                return $this;
            }
            public function build()
            {
                return new MilkTea($this->size,$this->havePlankCake,$this->temperate,$this->havePearl,$this->milk,$this->tea);
            }
        }

        ?>
        ```
        Ở trong mỗi hàm ta cần return ra this để những method khác có thể nhảy vào để tiếp tục add property mình cần
        Và function build dùng để tạo ra 1 đối tượng từ những phương thưc trên 
        ```
        






        
    

