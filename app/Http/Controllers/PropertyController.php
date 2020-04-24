<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class PropertyController
 * @package App\Http\Controllers
 */
class PropertyController extends Controller
{

    public function index()
    {
        //$properts = DB::select("select * from properts");
        $properts = Property::all();

        return view('property.index')->with('property', $properts);
    }

    public function show($name)
    {
       //$property = DB::select("select * from properts where name = ?", [$name]);
        $property = Property::where('name', $name)->get();
       if (!empty($property)){
           return view('property.show')->with('property', $property);
       }else{
           return redirect()->action('PropertyController@index');
       }
    }

    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $propertySlug = $this->setName($request->title);
//        $property = [
//            $request->title,
//            $propertySlug,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//        ];
//        DB::insert("insert into properts (title, name, description, rental_price, sale_price) values (?, ?, ?, ?, ?)", $property);

        $property = [
            'title' => $request->title,
            'name' =>  $propertySlug,
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price,
        ];

        Property::create($property);

        return redirect()->action("PropertyController@index");
    }

    public function edit($name)
    {
        //$property = DB::select("select * from properts where name = ?", [$name]);
        $property = Property::where('name', $name)->get();
        if (!empty($property)){
            return view('property.edit')->with('property', $property);
        }else{
            return redirect()->action('PropertyController@index');
        }
    }

    public function update(Request $request, $id)
    {
        $propertySlug = $this->setName($request->title);

//        $property = [
//            $request->title,
//            $propertySlug,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//            $id
//        ];
//        DB::update("update properts set title = ?, name = ?, description = ?, rental_price = ?, sale_price = ? where id = ?", $property);

        $property = Property::find($id);

        $property->title = $request->title;
        $property->name = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->action('PropertyController@index');
    }

    public function destroy($name)
    {
        //$property = DB::select("select * from properts where name = ?", [$name]);
        $property = Property::where('name', $name)->get();
        if (!empty($property)){
            DB::delete("delete from properts where name = ?", [$name]);
        }
        return redirect()->action('PropertyController@index');
    }

    private function setName($title)
    {
        $propertySlug = Str::slug($title);

        //$properties = DB::select("select * from properts");
        $properties = Property::all();
        $t = 0;
        foreach ($properties as $property){
            if (Str::slug($property->title) === $propertySlug){
                $t++;
            }
        }
        if ($t > 0 ){
            $propertySlug = $propertySlug . '-' . $t;
        }
        return $propertySlug;
    }
}
