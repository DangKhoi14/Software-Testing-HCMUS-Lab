import java.util.Arrays;

public class Main {
    public static void main(String[] args) {
        System.out.println("Before: ");
        testBefore();
        System.out.println("\nAfter: ");
        testAfter();
    }

    public static void testBefore() {
        // Test Case 1.1: Đặt đúng 5 món
        FoodOrderBefore order1 = new FoodOrderBefore(
                Arrays.asList("Pizza", "Burger", "Fries", "Salad", "Soup"),
                Arrays.asList(1, 1, 1, 1, 1),
                600000,
                true,
                "credit_card",
                true,
                true,
                true
        );
        System.out.println(order1.placeOrder()); // Expect: "Order placed successfully!"

        // Test Case 2.2: Tổng giá trị đơn hàng < 100.000 VNĐ
        FoodOrderBefore order2 = new FoodOrderBefore(
                Arrays.asList("Fries"),
                Arrays.asList(1),
                95000,
                true,
                "cash",
                true,
                true,
                true
        );
        System.out.println(order2.placeOrder()); // Expect: "Total order amount must be at least 100,000 VNĐ."

        // Test Case 5.2: Một món đã hết hàng
        FoodOrderBefore order3 = new FoodOrderBefore(
                Arrays.asList("Pizza", "Fries"),
                Arrays.asList(1, 1),
                150000,
                true,
                "cash",
                true,
                false,
                false
        );
        System.out.println(order3.placeOrder()); // Expect: "One or more items are out of stock."
    }

    public static void testAfter() {
        // Test Case 3.2: Tổng giá trị đơn hàng > 500.000 VNĐ và áp mã giảm giá
        FoodOrderAfter order1 = new FoodOrderAfter(
                Arrays.asList("Pizza", "Burger", "Fries", "Salad", "Soup"),
                Arrays.asList(1, 1, 1, 1, 1),
                600000,
                true,
                "credit_card",
                true,
                true,
                true
        );
        System.out.println(order1.placeOrder()); // Expect: "Order placed successfully!"

        // Test Case 6.2: Một món có số lượng > 10
        FoodOrderAfter order2 = new FoodOrderAfter(
                Arrays.asList("Pizza", "Fries"),
                Arrays.asList(11, 1),
                300000,
                true,
                "credit_card",
                true,
                true,
                true
        );
        System.out.println(order2.placeOrder()); // Expect: "You can only order a maximum of 10 portions of each item."

        // Test Case 7.2: Chưa thanh toán
        FoodOrderAfter order3 = new FoodOrderAfter(
                Arrays.asList("Pizza", "Fries"),
                Arrays.asList(1, 1),
                150000,
                false,
                "cash",
                true,
                true,
                true
        );
        System.out.println(order3.processPayment()); // Expect: "Payment is required before processing the order."

        // Test Case 10.2: Đặt không đủ 30 phút trước giao hàng
        FoodOrderWithDelivery order4 = new FoodOrderWithDelivery(
                Arrays.asList("Pizza", "Burger"),
                Arrays.asList(1, 1),
                200000,
                true,
                "cash",
                true,
                true,
                true,
                System.currentTimeMillis(), // Thời gian hiện tại
                System.currentTimeMillis() + 15 * 60 * 1000 // Thời gian giao hàng: 15 phút sau
        );
        System.out.println(order4.placeOrder()); // Expect: "Orders must be placed at least 30 minutes before the desired delivery time."
    }
}