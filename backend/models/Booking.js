// Load Mongoose library for data modeling
const mongoose = require('mongoose');

// Load Mongoose schema for models
const Schema = mongoose.Schema;

// Create a new Schema for the Availability
const BookingSchema = new Schema({ 
    name1:  {
    	type: String, 
    	required: [true, 'Name is required']
    }, 
    name2:  {
    	type: String, 
    	required: [true, 'Name is required']
    },
    package_id: String,
    wedding_date: {
    	type: String, 
    	unique: true,
    	required: [true, 'Date is required']
    },
    mobile: {
    	type: String, 
    	required: [true, 'Mobile is required']
    },
    message: String,
    ownerEmail: String,
    status: {type: String, default: "booked"},
    date : String,
});

// Set up the transaction model and export it to the main application
module.exports = mongoose.model('Booking', BookingSchema);