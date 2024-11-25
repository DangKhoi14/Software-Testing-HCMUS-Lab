import java.time.LocalDate;

public class HotelBookingBefore {
    private int userAge;
    private String roomType; // "Standard", "Deluxe", "Suite"
    private int nights;
    private int numberOfRooms;
    private int peoplePerRoom;
    private int availableRoomsStandard;
    private int availableRoomsDeluxe;
    private int availableRoomsSuite;
    private double balance;
    private double roomPrice;

    public HotelBookingBefore(int userAge, String roomType, int nights, int numberOfRooms, int peoplePerRoom, double balance) {
        this.userAge = userAge;
        this.roomType = roomType;
        this.nights = nights;
        this.numberOfRooms = numberOfRooms;
        this.peoplePerRoom = peoplePerRoom;
        this.balance = balance;
        this.roomPrice = 100;
        // Room availability
        this.availableRoomsStandard = 5;
        this.availableRoomsDeluxe = 3;
        this.availableRoomsSuite = 2;
    }
    public HotelBookingBefore() {}

    public String bookRoom() {
        if (userAge < 18) {
            return "You must be at least 18 years old.";
        }

        if (nights <= 1) {
            return "You must book at least 1 night.";
        }

        if (!roomType.equals("Standard ") && !roomType.equals("Deluxe") && !roomType.equals("Suite")) {
            return "Invalid room type.";
        }

        if (numberOfRooms > 3) {
            return "You can only book up to 3 rooms.";
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

        if (peoplePerRoom > 2) {
            return "Too many people for the room.";
        }

        double totalAmount = numberOfRooms * nights * roomPrice;
        if (balance < totalAmount) {
            return "Insufficient balance.";
        }

        // Deduct balance
        balance -= totalAmount;

        // Deduct rooms
        if (roomType.equals("Standard ")) availableRoomsStandard -= numberOfRooms;
        if (roomType.equals("Deluxe")) availableRoomsDeluxe -= numberOfRooms;
        if (roomType.equals("Suite")) availableRoomsSuite -= numberOfRooms;

        return "Booking successful!";
    }

    public String cancelRoom() {
        return "Room canceled successfully!";
    }

}
