// Include the Express framework that we will depend on
const express = require('express');

// Include the router used in express
const router = express.Router();

// Include the User Model
const BlogModel = require('./../models/Blog');


//CREATE A NEW blog
router.post('/create', (req, res, next) => {
	console.log(req.body)
	// res.send({type : 'POST'})
	BlogModel.create(req.body)
	.then(blog => {
		res.send(blog)
	}).catch(next)

	// res.send({
	// 	type : "POST",
	// 	name : req.body.name,
	// 	portfolio : req.body.portfolio,
	// 	hired : req.body.hired,
	// 	batch : req.body.batch
	// })

})

// RETRIEVE A blog
router.get('/', (req, res) => {
	BlogModel.find({}, (err, blogs) => {
		// console.log(blogs)
		if(!err) {
			return res.json({
				'data' : {
					'blogs' : blogs
				}
			})
		} else {
			console.log(err)
		}
	})
})

//d RETRIEVE A SINGLE blog
router.get('/:id', (req,res)=> {
	// console.log(req.params.id)
	// execute a query in our blogs collection to filter out the document with an _id equal to
	// the value of the req.params.id
	BlogModel.findOne({'_id' : req.params.id})
	.then(blog=> {
		console.log(blog)
		if(blog) {
			return res.json({
				'data' : {
					'blog' : blog
				}
			})
		}
		return res.json({
			'message' : 'no blog with the given id'
		})
	})

})

//DELETE A blog
// localhost:3000/blogs/delete
router.delete('/delete', (req, res, next) => {
	// console.log(req.body.blogId)
	// res.send({type : 'DELETE'});
	BlogModel.deleteOne({_id : req.body.id })
		.then(blog => {
			res.send(blog)
		}).catch(next)
})

//UPDATE A blog
router.put('/:blogId', (req, res, next) => {
	console.log(req.body)
	// res.send({type : 'PUT'});
	BlogModel.updateOne({_id : req.params.blogId}, req.body)
	.then( ()=> {
		BlogModel.findOne({_id : req.params.blogId})
			.then(blog => {
				res.send(blog)
			})
	}).catch(next)
})


module.exports = router;


module.exports = router;