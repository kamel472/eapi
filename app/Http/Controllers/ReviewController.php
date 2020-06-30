<?php

namespace App\Http\Controllers;

use App\Model\Review;
use App\Model\Product;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\product\ProductResource;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{

    public function __construct(){

        $this->middleware('jwt')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request , Product $product)
    {

        $review = new Review ($request->all());
        $product->reviews()->save($review);

        return response([

            'data'=> new ProductResource($product)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product, Review $review)
    {
        $review->update($request->all());

        return response([

            'data'=> new ReviewResource($review)
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product , Review $review )
    {
        $review->delete();
        return response(null,204);
    }
}
