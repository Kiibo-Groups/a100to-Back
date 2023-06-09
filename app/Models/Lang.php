<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class Lang extends Authenticatable
{
    public function getAll()
    {
        $english = [

        'rating'                                => 'Rate us, how was the food ',
        'location_title'                        => 'Your Location',
        'location_change'                       => 'Change',
        'store_trending'                        => 'Trending',
        'store_close'                           => 'Store is closed right now.',
        'home_title'                            => 'Home',
        'search_title'                          => 'Search',
        'profile_title'                         => 'Profile',
        'setting_title'                         => 'Account Setting',
        'user_name'                             => 'Full Name',
        'user_email'                            => 'Email',
        'username_msg'                          => 'this email will be your username',
        'user_phone'                            => 'Phone',
        'user_password'                         => 'Change Your Password',
        'user_button'                           => 'Update',
        'logout'                                => 'Logout',
        'profile_welcome'                       => 'Welcome',
        'order_history'                         => 'Order History',
        'profile_infomation'                    => 'Profile Information',
        'item_title'                            => 'Item',
        'item_price'                            => 'Price',
        'item_qty'                              => 'Quantity',
        'item_total'                            => 'Total',
        'item_status'                           => 'Status',
        'item_cancel'                           => 'Cancel',
        'item_empty'                            => 'Opps! You do not have any order yet.',
        'account_update'                        => 'Update Account Setting',
        'success_line'                          => 'Your Order Placed Successfully. Order ID is',
        'success_notify'                        => 'You will be notify when order status changed',
        'success_home'                          => 'Back To Home',
        'checkout_welcome'                      => 'Please Review Your Delivery Address Before Place Order',
        'checkout_title'                        => 'Checkout',
        'checkout_del'                          => 'Delivery Address',
        'checkout_notes'                        => 'Any Special instruction',
        'place_order'                           => 'Place Order',
        'signup_account'                        => 'Already have an account?',
        'signup'                                => 'Signup',
        'choose_password'                       => 'Choose Password',
        'signup_welcome'                        => 'Create Your Account For Fast Ordering',
        'signup_title'                          => 'Signup',
        'fb'                                    => 'Login With Facebook',
        'or'                                    => 'OR',
        'login_account'                         => "Don't have an account?",
        'login_signup'                          => 'Signup Now',
        'login_password'                        => 'Password',
        'login_username'                        => 'Username/Email',
        'login_welcome'                         => 'Please Login To Continue',
        'login_title'                           => 'Login',
        'offer_title'                           => 'Apply Coupon Code',
        'offer_apply'                           => 'Apply Now',
        'cart_payable_amount'                   => 'Payable Amount',
        'cart_apply_code'                       => 'Apply Coupon Code',
        'cart_change_code'                      => 'Change Coupon Code',
        'cart_d_charges'                        => 'Delivery Charges',
        'cart_discount'                         => 'Discount',
        'cart_total'                            => 'Total Amount',
        'cart_title'                            => 'View Cart',
        'search_title'                          => 'Search',
        'search_text'                           => 'Search for restaurants, dishes',
        'search_hint'                           => 'Start typing...',
        'search_new'                            => 'Newly Opened',
        'search_trend'                          => 'Trending',
        'search_discount'                       => 'Discount',
        'checkout_delivery'                     => 'Home Delivery',
        'checkout_pickup'                       => 'Pickup',
        'chat_title'                            => 'Chat',
        'chat_text'                             => 'Having any problem? do not worry, let us know we will help you.',
        'chat_message'                          => 'Write Your Message',
        'chat_success'                          => 'Thank You! we have received your message.',
        'chat_error'                            => 'Please update your email for send us a message',
        

        

        ];

       $arabic = [

        'rating'                                => 'Rate us, how was the food ',
        'location_title'                        => 'المدينه',
        'location_change'                       => 'تغيير المدينه',
        'store_trending'                        => 'الاكثر شيوعا',
        'store_close'                           => 'المطعم مغلق الان',
        'home_title'                            => 'الرئيسيه',
        'search_title'                          => 'بحث',
        'profile_title'                         => 'الملف الشخصي',
        'setting_title'                         => 'ضبط الحساب',
        'user_name'                             => 'الاسم كامل',
        'user_email'                            => 'البريد الالكتروني',
        'username_msg'                          => 'الايميل سيكون اسم المستخدم',
        'user_phone'                            => 'الهاتف',
        'user_password'                         => 'تغيير كلمة السر',
        'user_button'                           => 'تحديث',
        'logout'                                => 'تسجيل خروج',
        'profile_welcome'                       => 'اهلا وسهلا',
        'order_history'                         => 'الطلبات السابقه',
        'profile_infomation'                    => 'معلومات المستخدم',
        'item_title'                            => 'المنتج',
        'item_price'                            => 'السعر',
        'item_qty'                              => 'الكميه',
        'item_total'                            => 'المجموع',
        'item_status'                           => 'الحاله',
        'item_cancel'                           => 'الغاء',
        'item_empty'                            => 'اسف, لا يوجد اي طلبات سابقه',
        'account_update'                        => 'تحديث الحساب',
        'success_line'                          => 'طلبك اضيفه بنجاح, رقم الطلب ',
        'success_notify'                        => 'سيتم اعلامكم بحال تغير حالة الطلب ',
        'success_home'                          => 'الردوع للرئيسيه',
        'checkout_welcome'                      => 'الرجاء مراجعة عنوان التوصيل قبل اكمل العمليه',
        'checkout_title'                        => 'Checkout',
        'checkout_del'                          => 'عنوان التوصيل',
        'place_order'                           => 'اضف طلب',
        'signup_account'                        => 'عندك حساب؟',
        'signup'                                => 'تسجيل حساب',
        'choose_password'                       => 'إختر كلمة مرور',
        'signup_welcome'                        => '!انشىء حساب الان لطب اسرع',
        'signup_title'                          => 'تسجيل حساب جديد',
        'fb'                                    => 'سجل دخول باستخدام الفيسبوك',
        'or'                                    => 'أو',
        'login_account'                         => "ليس لك معنا حساب؟",
        'login_signup'                          => '!سجل معنا الان',
        'login_password'                        => 'كلمة المرور',
        'login_username'                        => 'اسم المستخدم او البريد الالكتروني',
        'login_welcome'                         => 'الرجاء تسجيل الدخول ',
        'login_title'                           => 'تسجيل دخول',
        'offer_title'                           => 'اضف قسيمة تسوق',
        'offer_apply'                           => 'تطبيق الان',
        'cart_payable_amount'                   => 'المبلغ المتحق للدفع',
        'cart_apply_code'                       => 'تطبيق قسيمه تسوق',
        'cart_change_code'                      => 'تغيير قسيمة تسوق',
        'cart_d_charges'                        => 'تكلفة التوصيل',
        'cart_discount'                         => 'خصم',
        'cart_total'                            => 'مجموع الحساب',
        'cart_title'                            => 'اظهر السله',
        'search_title'                          => 'Search',
        'search_text'                           => 'Search for restaurants, dishes',
        'search_hint'                           => 'Start typing...',
        'search_new'                            => 'Newly Opened',
        'search_trend'                          => 'Trending',
        'search_discount'                       => 'Discount',
        'checkout_notes'                        => 'Any Special instruction',
        'checkout_delivery'                     => 'Home Delivery',
        'checkout_pickup'                       => 'Pickup',
        'chat_title'                            => 'Chat',
        'chat_text'                             => 'Having any problem? do not worry, let us know we will help you.',
        'chat_message'                          => 'Write Your Message',
        'chat_success'                          => 'Thank You! we have received your message.',
        'chat_error'                            => 'Please update your email for send us a message',


        
        
    
        ];

        return ['english' => $english,'arabic' => $arabic];
    }
}
