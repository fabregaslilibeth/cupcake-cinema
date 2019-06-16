// Load Mongoose library for data modeling
const mongoose = require('mongoose');

// Load Mongoose schema for models
const Schema = mongoose.Schema;

// Create a new Schema for the Availability
const BlogSchema = new Schema({ 
    title: String, 
    content: String, 
    date: String
});

// Set up the transaction model and export it to the main application
module.exports = mongoose.model('Blog', BlogSchema);