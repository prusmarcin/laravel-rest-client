<?php
namespace Restclient\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductsController extends Controller
{

	/**
     * Variable store instance object of GuzzleHttp
     *
     * @var client
     */
    private $client;

	/**
     * Create instance new object.
     *
     */
    public function __construct()
    {
        $client = new Client([
            'base_uri' => config('restclient.url'),
            'defaults' => [
                'exceptions' => true
            ],
            'headers' => ['Content-Type' => 'application/json']
        ]);

        $this->client = $client;
    }

	/**
     * Display available products with amount > 0.
     *
     * @return products as json
     */
    public function available()
    {

        $res = $this->client->get('items/available');
        if ($res->getStatusCode() == 200) {
            $products = json_decode($res->getBody());

            return view('products::available', compact('products'));
        }
    }

	/**
     * Display available products with amount entered by user.
     *
	 * @param int $amount - count each product
     * @return products as json
     */
    public function availableCondition($amount)
    {
        if (isset($amount)) {
            $res = $this->client->get('items/available/' . $amount);
            if ($res->getStatusCode() == 200) {
                $products = json_decode($res->getBody());

                return view('products::availableCondition', compact('products', 'amount'));
            }
        }
    }

	/**
	* Display unavailable products with amount = 0.
     *
     * @return products as json
     */
    public function unavailable()
    {

        $res = $this->client->get('items/unavailable');
        if ($res->getStatusCode() == 200) {
            $products = json_decode($res->getBody());

            return view('products::unavailable', compact('products'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products::index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'amount' => 'required|integer'
        ]);

        $res = $this->client->post('items', ['body' => json_encode([
                'name' => $request->name,
                'amount' => $request->amount
        ])]);
        if ($res->getStatusCode() == 200) {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = $this->client->get('items/' . $id);

        if ($res->getStatusCode() == 200) {
            $product = json_decode($res->getBody());

            return view('products::edit', compact('product'));
        } else {
            $product = json_decode($res->getBody());
            echo $product->error;
            exit;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'amount' => 'required|integer'
        ]);

        $res = $this->client->put('items/' . $id, ['body' => json_encode([
                'name' => $request->name,
                'amount' => $request->amount
        ])]);
        if ($res->getStatusCode() == 200) {
            return redirect('products/available');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->client->delete('items/' . $id);
        if ($res->getStatusCode() == 200) {
            return redirect('products/available');
        }
    }
}
