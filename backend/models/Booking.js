// Load Mongoose library for data modeling
const mongoose = require('mongoose');

// Load Mongoose schema for models
const Schema = mongoose.Schema;

// Create a new Schema for the Availability
const BookingSchema = new Schema({ 
    name1: String,
    name2: String,
    package_id: String, 
    wedding_date: Date,
    mobile: String,
    message: String,
    ownerEmail: String,
    status: {type: String, default: "booked"},
    date : String,

    // name1: { type: String, 
    // 	required: [true, 'Name is required']
    // },    
    // name2: { type: String, 
    // 	required: [true, 'Name is required']
    // },
    // wedding_date: Date,
    // mobile: String,
    // message: String,
    // ownerEmail: String,
    // status: {type: String, default: "booked"},
    // date : String,
});

// Set up the transaction model and export it to the main application
module.exports = mongoose.model('Booking', BookingSchema);