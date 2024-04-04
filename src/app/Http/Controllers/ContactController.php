<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tell1', 'tell2', 'tell3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->category_id);
        return view('confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function admin() {
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        if($request->input('reset') == 'reset'){
            $contacts = Contact::with('category')->Paginate(7);
        } else {
            $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->Paginate(7);
        }
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function exportCsv(Request $request)
    {
        // TODO: 検索で絞り込んだ分をエクスポート（未）
        $contacts = Contact::all();
        $csvHeader = ['id', 'category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'];
        $csvData = $contacts->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }

}
