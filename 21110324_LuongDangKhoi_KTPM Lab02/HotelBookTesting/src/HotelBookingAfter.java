import java.time.LocalDate;

public class HotelBookingAfter {
    private int userAge;
    private String roomType;
    private int nights;
    private int numberOfRooms;
    private int peoplePerRoom;
    private int availableRoomsStandard;
    private int availableRoomsDeluxe;
    private int availableRoomsSuite;
    private double balance;
    private double roomPrice;
    private LocalDate bookingDate;

    public HotelBookingAfter(int userAge, String roomType, int nights, int numberOfRooms, int peoplePerRoom, double balance, LocalDate bookingDate) {
        this.userAge = userAge;
        this.roomType = roomType.trim();
        this.nights = nights;
        this.numberOfRooms = numberOfRooms;
        this.peoplePerRoom = peoplePerRoom;
        this.balance = balance;
        this.roomPrice = 100;
        this.bookingDate = bookingDate;
        this.availableRoomsStandard = 5;
        this.availableRoomsDeluxe = 3;
        this.availableRoomsSuite = 2;
    }
    public HotelBookingAfter() {}

    public String bookRoom() {
        if (userAge < 18) {
            return "You must be at least 18 years old.";
        }

        if (nights < 1) {
            return "You must book at least 1 night.";
        }

        if (!roomType.equals("Standard") && !roomType.equals("Deluxe") && !roomType.equals("Suite")) {
            return "Invalid room type.";
        }

        if (numberOfRooms > 3) {
            return "You can only book up to 3 rooms.";
        }

        if (bookingDate.isBefore(LocalDate.now().plusDays(1))) {
            return "You must book at least 1 day in advance.";
        }

        if (roomType.equals("Standard") && availableRoomsStandard < numberOfRooms) {
            return "Not enough Standard rooms available.";
        }
        if (roomType.equals("Deluxe") && availableRoomsDeluxe < numberOfRooms) {
            return "Not enough Deluxe rooms available.";
        }
        if (roomType.equals("Suite") && availableRoomsSuite < numberOfRooms) {
            return "Not enough Suite rooms available.";
        }

        int roomCapacity = switch (roomType) {
            case "Standard" -> 2;
            case "Deluxe" -> 4;
            case "Suite" -> 6;
            default -> 0;
        };

        if (peoplePerRoom > roomCapacity) {
            return "Too many people for the room.";
        }

        double totalAmount = numberOfRooms * nights * roomPrice;
        if (balance < totalAmount) {
            return "Insufficient balance.";
        }

        balance -= totalAmount;

        if (roomType.equals("Standard")) availableRoomsStandard -= numberOfRooms;
        if (roomType.equals("Deluxe")) availableRoomsDeluxe -= numberOfRooms;
        if (roomType.equals("Suite")) availableRoomsSuite -= numberOfRooms;

        return "Booking successful!";
    }

    public String cancelRoom(boolean isWithin24Hours, boolean isPaid) {
        if (!isPaid) {
            return "Room cancellation is not allowed because the payment has not been made.";
        }
        if (!isWithin24Hours) {
            return "Room cancellation is not allowed after the deadline.";
        }
        return "Room canceled successfully!";
    }
}
