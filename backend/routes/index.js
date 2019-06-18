const express = require('express');

const router = express.Router();

const UserModel = require('../models/User');

const bcrypt = require('bcrypt-nodejs');

//registration endpoint
router.post('/register', (req,res) => {
	let email = req.body.email;
	let password = req.body.password;

	if(!email || !password) {
		return res.status(500).json({
			'error' : 'incomplete'
		});
	}

	UserModel.find({'email' : email})
		.then((users, err) => {
			if(err) {
				return res.status(500).json({
					'error' : err
				});
			}

			if(users.length > 0) {
				return res.status(500).json({
					'error' : 'user already exists'
				});
			}

			bcrypt.genSalt(10, function(err, salt) {
				bcrypt.hash(password, salt, null, function(err, hash) {
					let newUser = UserModel({
						'email' : email,
						'password' : hash
					});

					newUser.save(err => {
						if(!err) {
							return res.json({
								message: 'User registered successfully'
							});
						}
					});
				});
			});
		});
});

module.exports = router;