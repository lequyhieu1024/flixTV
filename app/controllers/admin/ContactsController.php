<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Contacts;

class ContactsController extends BaseController
{
    protected $contact;
    public function __construct()
    {
        $this->contact = new Contacts();
    }
    public function index()
    {
        $count = $this->contact->count();
        $contacts = $this->contact->list();
        return $this->render('admin.contacts.index', compact('contacts', 'count'));
    }
    public function updateFlag($id, $flag)
    {
        $res = $this->contact->flag($id, $flag);
        $res ? redirect('success', 'đã thay đổi trạng thái', 'contacts/') : "";
    }
    public function destroy($id)
    {
        $res = $this->contact->delete($id);
        $res ? redirect('success', 'đã xóa', 'contacts/') : "";
    }
}
