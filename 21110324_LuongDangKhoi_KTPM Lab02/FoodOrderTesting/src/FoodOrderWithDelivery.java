import java.util.List;

public class FoodOrderWithDelivery extends FoodOrderAfter {
    private long orderTime;      // Thời gian đặt hàng (tính bằng millisecond)
    private long deliveryTime;   // Thời gian giao hàng mong muốn (tính bằng millisecond)

    public FoodOrderWithDelivery(
            List<String> items,
            List<Integer> quantities,
            double totalAmount,
            boolean isPaid,
            String paymentMethod,
            boolean hasMainDish,
            boolean isPromoCodeApplied,
            boolean isItemAvailable,
            long orderTime,
            long deliveryTime) {

        super(items, quantities, totalAmount, isPaid, paymentMethod, hasMainDish, isPromoCodeApplied, isItemAvailable);
        this.orderTime = orderTime;
        this.deliveryTime = deliveryTime;
    }

    @Override
    public String placeOrder() {
        // Kiểm tra xem thời gian giao hàng có được đặt ít nhất 30 phút trước không
        long currentTime = System.currentTimeMillis();
        long timeDifference = (deliveryTime - orderTime) / (1000 * 60); // Tính bằng phút

        if (timeDifference < 30) {
            return "Orders must be placed at least 30 minutes before the desired delivery time.";
        }

        return super.placeOrder(); // Gọi lại phương thức placeOrder() từ lớp FoodOrder để xử lý các kiểm tra khác
    }
}
