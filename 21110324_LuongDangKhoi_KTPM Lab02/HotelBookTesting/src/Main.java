import java.time.LocalDate;

public class Main {
    public static void main(String[] args) {
        System.out.println("Before: ");
        testBefore();
        System.out.println("\nAfter: ");
        testAfter();
    }

    public static void testBefore() {
        // Test case 1: Giới hạn độ tuổi
        HotelBookingBefore booking1 = new HotelBookingBefore(17, "Standard", 2, 1, 2, 300.0);
        System.out.println(booking1.bookRoom()); // Expected: "You must be at least 18 years old."

        // Test case 2: Số đêm tối thiểu
        HotelBookingBefore booking2 = new HotelBookingBefore(25, "Standard", 0, 1, 2, 300.0);
        System.out.println(booking2.bookRoom()); // Expected: "You must book at least 1 night."

        // Test case 3: Loại phòng hợp lệ
        HotelBookingBefore booking3 = new HotelBookingBefore(25, "Luxury", 2, 1, 2, 300.0);
        System.out.println(booking3.bookRoom()); // Expected: "Invalid room type."

        // Test case 4: Giới hạn đặt phòng tối đa
        HotelBookingBefore booking4 = new HotelBookingBefore(25, "Standard", 2, 4, 2, 300.0);
        System.out.println(booking4.bookRoom()); // Expected: "You can only book up to 3 rooms."

        // Test case 5: Giới hạn thời gian đặt phòng
        HotelBookingBefore booking5 = new HotelBookingBefore(25, "Standard", 2, 1, 2, 300.0);
        System.out.println(booking5.bookRoom()); // Expected: "You must book at least 1 day in advance."

        // Test case 6: Số phòng còn lại không đủ
        HotelBookingBefore booking6 = new HotelBookingBefore(25, "Suite", 2, 3, 2, 300.0);
        System.out.println(booking6.bookRoom()); // Expected: "Not enough Suite rooms available."

        // Test case 7: Giới hạn số lượng người
        HotelBookingBefore booking7 = new HotelBookingBefore(25, "Deluxe", 2, 1, 5, 300.0);
        System.out.println(booking7.bookRoom()); // Expected: "Too many people for the room."

        // Test case 8: Xác minh thanh toán
        HotelBookingBefore booking8 = new HotelBookingBefore(25, "Deluxe", 2, 1, 2, 100.0);
        System.out.println(booking8.bookRoom()); // Expected: "Insufficient balance."

        // Test case 9: Đặt phòng thành công
        HotelBookingBefore booking9 = new HotelBookingBefore(25, "Standard", 2, 1, 2, 300.0);
        System.out.println(booking9.bookRoom()); // Expected: "Booking successful!"

        // Test case 10: Hủy phòng trước 24 giờ
        System.out.println(booking9.cancelRoom()); // Expected: "Room canceled successfully!"

        // Test case 11: Hủy phòng sau thời hạn
        System.out.println(booking9.cancelRoom()); // Expected: "Room cancellation is not allowed after the deadline."
    }

    public static void testAfter() {
        // Test case 1: Giới hạn độ tuổi
        HotelBookingAfter booking1 = new HotelBookingAfter(17, "Standard", 2, 1, 2, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking1.bookRoom()); // Expected: "You must be at least 18 years old."

        // Test case 2: Số đêm tối thiểu
        HotelBookingAfter booking2 = new HotelBookingAfter(25, "Standard", 0, 1, 2, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking2.bookRoom()); // Expected: "You must book at least 1 night."

        // Test case 3: Loại phòng hợp lệ
        HotelBookingAfter booking3 = new HotelBookingAfter(25, "Luxury", 2, 1, 2, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking3.bookRoom()); // Expected: "Invalid room type."

        // Test case 4: Giới hạn đặt phòng tối đa
        HotelBookingAfter booking4 = new HotelBookingAfter(25, "Standard", 2, 4, 2, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking4.bookRoom()); // Expected: "You can only book up to 3 rooms."

        // Test case 5: Giới hạn thời gian đặt phòng
        HotelBookingAfter booking5 = new HotelBookingAfter(25, "Standard", 2, 1, 2, 300.0, LocalDate.now());
        System.out.println(booking5.bookRoom()); // Expected: "You must book at least 1 day in advance."

        // Test case 6: Số phòng còn lại không đủ
        HotelBookingAfter booking6 = new HotelBookingAfter(25, "Suite", 2, 3, 2, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking6.bookRoom()); // Expected: "Not enough Suite rooms available."

        // Test case 7: Giới hạn số lượng người
        HotelBookingAfter booking7 = new HotelBookingAfter(25, "Deluxe", 2, 1, 5, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking7.bookRoom()); // Expected: "Too many people for the room."

        // Test case 8: Xác minh thanh toán
        HotelBookingAfter booking8 = new HotelBookingAfter(25, "Deluxe", 2, 1, 2, 100.0, LocalDate.now().plusDays(2));
        System.out.println(booking8.bookRoom()); // Expected: "Insufficient balance."

        // Test case 9: Đặt phòng thành công
        HotelBookingAfter booking9 = new HotelBookingAfter(25, "Standard", 2, 1, 2, 300.0, LocalDate.now().plusDays(2));
        System.out.println(booking9.bookRoom()); // Expected: "Booking successful!"

        // Test case 10: Hủy phòng trước 24 giờ
        System.out.println(booking9.cancelRoom(true, true)); // Expected: "Room canceled successfully!"

        //Test case 11: Huỷ phòng trước 24 giờ nhưng chưa thanh toán
        System.out.println(booking9.cancelRoom(true, false)); // Expected: "Room cancellation is not allowed because the payment has not been made."

        // Test case 12: Hủy phòng sau thời hạn
        System.out.println(booking9.cancelRoom(false, true)); // Expected: "Room cancellation is not allowed after the deadline.
    }
}
