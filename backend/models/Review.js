// Load Mongoose library for data modeling
const mongoose = require('mongoose');

// Load Mongoose schema for models
const Schema = mongoose.Schema;

// Create a new Schema for the Review
const ReviewSchema = new Schema({ 
    ownerEmail: String, 
    title: String,
    message: String,
    is_displayed: {
		type : Boolean,
		default : false
	},
    date: String
});

// Set up the Review model and export it to the main application
module.exports = mongoose.model('Review', ReviewSchema);