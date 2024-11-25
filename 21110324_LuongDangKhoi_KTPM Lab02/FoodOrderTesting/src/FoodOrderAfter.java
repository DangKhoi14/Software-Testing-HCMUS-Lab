import java.util.List;

public class FoodOrderAfter {
    private List<String> items;
    private List<Integer> quantities;
    private double totalAmount;
    private boolean isPaid;
    private String paymentMethod;
    private boolean hasMainDish; // true nếu có món chính trong đơn
    private boolean isPromoCodeApplied;
    private boolean isItemAvailable; // true nếu tất cả món đều có sẵn
    private int maxItemsPerOrder = 5; // Giới hạn món tối đa trong mỗi đơn hàng

    public FoodOrderAfter(List<String> items, List<Integer> quantities, double totalAmount, boolean isPaid, String paymentMethod, boolean hasMainDish, boolean isPromoCodeApplied, boolean isItemAvailable) {
        this.items = items;
        this.quantities = quantities;
        this.totalAmount = totalAmount;
        this.isPaid = isPaid;
        this.paymentMethod = paymentMethod;
        this.hasMainDish = hasMainDish;
        this.isPromoCodeApplied = isPromoCodeApplied;
        this.isItemAvailable = isItemAvailable;
    }

    public String placeOrder() {
        // Giới hạn số món trong đơn hàng
        if (items.size() > maxItemsPerOrder) {
            return "You can only order up to 5 items.";
        }

        // Kiểm tra tổng giá trị đơn hàng
        if (totalAmount < 100000) {
            return "Total order amount must be at least 100,000 VNĐ.";
        }

        // Kiểm tra tất cả các món ăn còn hàng
        if (!isItemAvailable) {
            return "One or more items are out of stock.";
        }

        // Kiểm tra số lượng từng món không vượt quá 10 phần
        for (int quantity : quantities) {
            if (quantity > 10) {
                return "You can only order a maximum of 10 portions of each item.";
            }
        }

        // Kiểm tra đơn hàng có ít nhất một món chính
        if (!hasMainDish) {
            return "You must have at least one main dish in your order.";
        }

        // Khuyến mãi chỉ áp dụng cho đơn hàng trên 500.000 VNĐ
        if (totalAmount > 500000 && !isPromoCodeApplied) {
            return "Promo code must be applied for orders over 500,000 VNĐ.";
        }

        // Giới hạn thanh toán qua thẻ tín dụng
        if (paymentMethod.equals("credit_card") && totalAmount < 200000) {
            return "Credit card payment is only available for orders above 200,000 VNĐ.";
        }

        // Đơn hàng hợp lệ
        return "Order placed successfully!";
    }

    public String processPayment() {
        // Kiểm tra trạng thái thanh toán
        if (!isPaid) {
            return "Payment is required before processing the order.";
        }
        return "Payment processed successfully.";
    }
}

