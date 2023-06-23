<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use App\Models\Contact;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MainController extends Controller
{
    //Index
    public function index()
    {
        $contacts = Contact::all();

         return view('index', compact('contacts'));
    }

    public function profile($id){
        $profile = Contact::where('id', $id)->first();
        $url = QrCode::generate('Make me into a QrCode!');
        return view('profile', compact('profile', 'url'));
    }

    public function vcard($id){
        $profile = Contact::where('id', $id)->first();
        
        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = $profile->name;
        $firstname = $profile->lastname;


        // add personal data
        $vcard->addName($lastname, $firstname);

        // add work data
        $vcard->addCompany('Siesqo');
        $vcard->addJobtitle('Web Developer');
        $vcard->addRole('Data Protection Officer');
        $vcard->addEmail('info@jeroendesloovere.be');
        $vcard->addPhoneNumber($profile->phone, 'PREF;WORK');
        $vcard->addPhoneNumber($profile->phone, 'WORK');
        $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL('http://www.jeroendesloovere.be');

        $vcard->addPhoto('https://placehold.co/400');

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();
    }
}
