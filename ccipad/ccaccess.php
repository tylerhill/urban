<?php
use Ctct\ConstantContact;
use Ctct\Components\Contacts\Contact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\Contacts\EmailAddress;
use Ctct\Exceptions\CtctException;
set_include_path('../' .get_include_path());
require_once 'Ctct/autoload.php';



define("APIKEY", "c32mdzs9n5nytnhybvvvt8yw");
define("ACCESS_TOKEN", "71e27a80-a745-4bdf-b822-9e343490c1d5");
try {
$cc = new ConstantContact(APIKEY); 
$urbanList = 1688731786;
$contact = new Contact();
$contact->addList($_POST['list']);
$contact->addEmail($_POST['email']);
$answer = $cc->addContact(ACCESS_TOKEN,$contact,false);
$lists = $cc->getList(ACCESS_TOKEN,$urbanList); 
$count = $lists->contact_count;
echo "Thank you for signing up!";
} catch (CtctException $e) {
	$errors = $e->getErrors();
	if($errors) {
		echo "Sorry, that's not a valid email address!";
	}
	//foreach ($errors as $error) {
	//	$errKey = $error['error_key'];
	//	switch ($errKey) {
	//	case 'http.status.email_address.conflict':
	//		echo "You're already on our list!";
	//		break;
	//		default: 
	//		echo "Sorry, that's not a valid email address!";
	//		break;
	//	}
	//		
	//}
}

//$contact->first_name = $_POST['first_name'];
//$contact->last_name = $_POST['last_name'];

?>
