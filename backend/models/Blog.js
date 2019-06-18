// Load Mongoose library for data modeling
const mongoose = require('mongoose');

// Load Mongoose schema for models
const Schema = mongoose.Schema;

// Create a new Schema for the Availability
const BlogSchema = new Schema({ 
    title: String, 
    content: String, 
    img_path: {
    	type: String,
    	default: 'https://images.all-free-download.com/images/graphicthumb/wedding_background_with_pink_roses_313011.jpg'
    },
    date: String
});

// Set up the transaction model and export it to the main application
module.exports = mongoose.model('Blog', BlogSchema);