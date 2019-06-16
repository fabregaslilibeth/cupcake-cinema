// include the express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

// Include our configuration within config.js
const config = require('./../config');

//require the dev model 
const BookingModel = require('../models/Booking');

const UserModel = require('../models/User');

const moment = require("moment");

// router.get('/', (req, res) => {
// 	res.send({type : 'GET'});
// })

//CREATE A NEW booking
router.post('/', (req, res) => {
		
		// Build the new transaction
		let newBooking = new BookingModel({
			'ownerEmail': req.body.email,
			'name1': req.body.name1,
			'name2': req.body.name2,
			'message': req.body.message,
			'wedding_date' : req.body.wedding_date,
			'mobile' : req.body.mobile,			
			'package_id' : req.body.package_id,
			'date' : moment().format('MMMM Do YYYY, h:mm:ss a') 
		});

		  	// Proceed to save the information to the data base
			newBooking.save( (err, booking) => {
				
				// If there is a problem with the database, throw an error
				if(err){
					return res.status(500).json({
						'error': err 
					});
				}

				// If database operation is successful return success
				return res.status(200).json(booking);

			});

});

// Retrieve all transactions of the logged in user
router.get('/:id', (req, res) => {
	//Find user email based on the user ID taken from URL
	
	UserModel.findOne({'_id': req.params.id}).then( (user) => {
		if(!user){
			return res.status(200).json({
				'message': 'No user found'
			});
		}

		let email = user.email;
		//find all transactions of specified user
		BookingModel.find({'ownerEmail': email}).then( (bookings) => {
			// If no bookings are found, 
			if(!bookings){
				return res.status(200).json({ 
					'message': 'No bookings to show.'
				});
			}

			// Return all bookings of the user in session
			return res.status(200).json({ 
				'data': {
					'bookings': bookings
				}
			});
		});
	});
});


router.get('/showEdit/:id', (req, res) => {

	// Search for the specific availability based on the ID
	BookingModel.findOne({ '_id': req.params.id }).then( (booking) => {

		// If no threads are available, return a successful request with info
		if(!booking){
			return res.status(200).json({ 
				'message': 'No available booking to show.'
			});
		}

		// Return the satisfying booking based on the ID
		return res.status(200).json({
				'booking': booking
		});

	});

});

router.put('/:id', (req, res) => {

	BookingModel.update( { '_id' : req.params.id}, req.body )
		.then( booking => {
			if(booking) {
				return res.json({
					'data' : {
						'booking' : booking,
						'message' : 'booking successfully updated.'
					}
				});
			}

			return res.json({
				'message' : 'No booking with the given ID found'
			});
		});
});



// Retrieve all transactions 
router.get('/', (req, res) => {
	// Find all transactions in the database for admin use
	BookingModel.find({}).then( (bookings) => {

		// If no bookings are found, 
		if(!bookings){
			return res.status(200).json({ 
				'message': 'No bookings to show.'
			});
		}

		// Return all bookings of the user in session
		return res.status(200).json({ 
			'data': {
				'bookings': bookings
			}
		});
	});
});


//delete
router.delete('/delete', (req,res, next) => {

	BookingModel.deleteOne({_id : req.body.id })
		.then(booking => {
			console.log(booking)
			// res.send(booking)
		}).catch(next)
})


module.exports = router;