import java.util.List;

public class FoodOrderBefore {
    private List<String> items;
    private List<Integer> quantities;
    private double totalAmount;
    private boolean isPaid;
    private String paymentMethod;
    private boolean hasMainDish; // true nếu có món chính trong đơn
    private boolean isPromoCodeApplied;
    private boolean isItemAvailable; // true nếu món có sẵn
    private int maxItemsPerOrder = 5; // Giới hạn món tối đa trong mỗi đơn hàng

    public FoodOrderBefore(List<String> items, List<Integer> quantities, double totalAmount, boolean isPaid, String paymentMethod, boolean hasMainDish, boolean isPromoCodeApplied, boolean isItemAvailable) {
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
        if (items.size() > maxItemsPerOrder) {
            return "You can only order up to 5 items.";
        }

        if (totalAmount < 100000) {
            return "Total order amount must be at least 100,000 VNĐ.";
        }

        if (!isItemAvailable) {
            return "One or more items are out of stock.";
        }

        if (quantities.size() > 0 && quantities.get(0) > 10) {
            return "You can only order a maximum of 10 portions of each item.";
        }

        if (!hasMainDish) {
            return "You must have at least one main dish in your order.";
        }

        if (totalAmount > 500000 && !isPromoCodeApplied) {
            return "Promo code must be applied for orders over 500,000 VNĐ.";
        }

        if (paymentMethod.equals("credit_card") && totalAmount < 200000) {
            return "Credit card payment is only available for orders above 200,000 VNĐ.";
        }

        if (totalAmount > 0 && totalAmount <= 500000) {
            return "Order placed successfully without promo code.";
        }

        return "Order placed successfully!";
    }

    public String processPayment() {
        if (!isPaid) {
            return "Payment is required before processing the order.";
        }
        return "Payment processed successfully.";
    }
}

