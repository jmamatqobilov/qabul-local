<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Direction;
use App\Models\DObjectType;
use App\Models\Document;
use App\Models\Endpoint;
use App\Models\Inspection;
use App\Models\MObject;
use App\Models\RObject;
use App\Models\SObject;
use App\Models\TObject;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DeleteTestUsersController extends Controller
{
    public function fetch_users()
    {
//        $endpoints = Endpoint::withTrashed()->where('object_type_id', null)->get();
//
//        if ($endpoints) {
//            foreach ($endpoints as $endpoint) {
//                if (is_object($endpoint)) {
//                    $endpoint->forceDelete();
//                }
//            }
//        }

        /* working !!*/
//        $testObjects = MObject::where('deleted_at', '!=', null)->get();
//        dd('salama');

//        $freeEndpoints = Endpoint::withTrashed()->where('object_type_id', null)->get();

//        dd($freeEndpoints);

        $users = User::withTrashed()->whereIn('email', [
            'andbeeline@gis.uz',
            'anducell@gis.uz',
            'andums@gis.uz',
            'andmobile@gis.uz',
            'andrws@gis.uz',
            'andtelecom@gis.uz',
            'andisttelecom@gis.uz',
            'andcitywifi@gis.uz',
            'andcems@gis.uz',
            'andrtum@gis.uz',
            '@mail.ru',
            'Ars telekom@mail.ru',
            'OsiyoTV@mail.ru',
            'CosmosMCHJ@mail.ru',
            'IAntiqaI@mail.ru',
            'CAntiqaC@mail.ru',
            'BAntiqaB@mail.ru',
            'TAntiqaT@mail.ru',
            'malumotlaruzatish@mail.ru',
            'BteleradioB@mail.ru',
            'CteleradioC@mail.ru',
            'DteleradioD@mail.ru',
            'BmobilB@mail.ru',
            'DmobilD@mail.ru',
            'CmobilC@mail.ru',
            'Jiztelecom@test',
            'Besttelecom@test',
            'Citycom@test',
            'Bestnet@test',
            'MTNL@test',
            'MTCP@test',
            'Shahboztv@test',
            'Nurtv@test',
            'Jiztv@test',
            'Zaminfm@test',
            'Jizfm@test',
            'Kamolotfm@test',
            'qashqadaryotelekom@umail.uz',
            'isttelekom@umail.uz',
            'turon@umail.uz',
            'qashqadaryortum@umail.uz',
            'Dildora-f@umail.uz',
            'umsqarshi@umail.uz',
            'unitelqarshi@umail.uz',
            'coscomqarshi@umail.uz',
            'uzmobaylqarshi@umail.uz',
            'perfektumqarshi@umail.uz',
            'Navoi_test@ucell.uz',
            'Navoi_test@beeline.uz',
            'Navoi_test@ums.uz',
            'Navoi_test@uzmobile.uz',
            'Navoi_test@east-telecom.uz',
            'Navoi_test@telecom.uz',
            'Navoi_test@evo.uz',
            'Navoi_test@rtum.uz',
            'Navoi_test@rikom.uz',
            'Navoi_test@bexruz.uz',
            'nam_tel_test',
            'nam_isttel_test',
            'nam_shak_test',
            'nam_rtum_test',
            'nam_ktv_test',
            'nam_city_test',
            'nam_uzon_test',
            'nam_ucel_test',
            'nam_unitel_test',
            'nam_uzmob_test',
            'Samtelecom@test',
            'SamTTT-4@test',
            'Samarsin@test',
            'Samums@test',
            'Samtps@test',
            'Samafrosiyo@test',
            'SamRtum@test',
            'Sambeeline@test',
            'Samsimus@test',
            'Samcoscom@test',
            'test@sirtel.uz',
            'test@sircom.uz',
            'test@sity-1.uz',
            'test@ist.uz',
            'test@best.uz',
            'test@soft.uz',
            'test@turon.uz',
            'test@tele.uz',
            'test@sirTRK.uz',
            'test@ucell.uz',
            'test@uzmobile.uz',
            'test@beeline.uz',
            'testunitel@gis.uz',
            'testsimus@gis.uz',
            'testruxsor@gis.uz',
            'testftelecom@gis.uz',
            'testFVKTV@gis.uz',
            'testcoscom@gis.uz',
            'testcomnet@gis.uz',
            'testmuloqot@gis.uz',
            'testist-telecom@gis.uz',
            'testrah-shax@gis.uz',
            'delid@umail.uz',
            'pertec@umail.uz',
            'kabel@umail.uz',
            'zaza@umail.uz',
            'hayattelecom@umail.uz',
            'pitnaktv@umail.uz',
            'gurlaninternet@umail.uz',
            'jayhunmobil@umail.uz',
            'gurlantv@umail.uz',
            'shovotradio@umail.uz',
            'yangibozor@umail.uz',
            'honqamobil@umail.uz',
            'shovotaloqa@umail.uz',
            'yantelecom@umail.uz',
            'omonaloqa@umail.uz',
            'urganchinternet@umail.uz',
            'honqamobil@umail.uz',
            'tashkent.region@gis.uz',
            'tashkent1@gis.uz',
            'tashkent@gis.uz',
            'test@gis.uz',
            'uzmobile@gis.uz',
            'coscom@gis.uz',
            'unitel@gis.uz',
            'mobi@gis.uz',
            'perfectum@gis.uz',

            'javohirjuraev1992@gmail.com',
            'max@max123.com',
            'test@user123.com',
            'test121@test.com',
            'sardor_bahromov@mail.ru',
            'test1@gis.uz',
            'sardor_bahromov@mail.ru',
            'test2@gis.uz',
            'samarkand@gis.uz',
        ])->get();

//        dd($users);
    }

    /**
     * deletes user(s)
     */
    public function delete_test_users()
    {
        $actions = Endpoint::withTrashed()->where('object_type_id', null)->get();
        if ($actions) {
            foreach ($actions as $action) {
                if (is_object($action)) {
                    $action->forceDelete();
                }
            }
        }

        /* test */
//        $freeActions = Endpoint::withTrashed()->where('object_type_id', null)->get();
//        dd($freeActions);

//        $testEndp = Endpoint::withTrashed()->get();
//        dd($testEndp);

//        $mObject = MObject::where('deleted_at', '!=', null)->get();
//        dd($mObject);

        $usersToBeDeleted = User::withTrashed()->whereIn('email', [
            /*local*/
//            'newtest@gmial.copm',
//            'testing123@test.com',
//            'asdf@asdf.sdf',
//            'test2@test.com',
//            'sukhrobsadfasdfnuralievv@gmail.com',
//            'sukhrobnsdfgguralievv@gmail.com',
//            'max12312@max.com',
//            'testusers@test.com',
//            'test@user.com',
            /*local*/

//            'andbeeline@gis.uz',
//            'anducell@gis.uz',
//            'andums@gis.uz',
//            'andmobile@gis.uz',
//            'andrws@gis.uz',
//            'andtelecom@gis.uz',
//            'andisttelecom@gis.uz',
//            'andcitywifi@gis.uz',
//            'andcems@gis.uz',
//            'andrtum@gis.uz',
//            '@mail.ru',
//            'Ars telekom@mail.ru',
//            'OsiyoTV@mail.ru',
//            'CosmosMCHJ@mail.ru',
//            'IAntiqaI@mail.ru',
//            'CAntiqaC@mail.ru',
//            'BAntiqaB@mail.ru',
//            'TAntiqaT@mail.ru',
//            'malumotlaruzatish@mail.ru',
//            'BteleradioB@mail.ru',
//            'CteleradioC@mail.ru',
//            'DteleradioD@mail.ru',
//            'BmobilB@mail.ru',
//            'DmobilD@mail.ru',
//            'CmobilC@mail.ru',
//            'Jiztelecom@test',
//            'Besttelecom@test',
//            'Citycom@test',
//            'Bestnet@test',
//            'MTNL@test',
//            'MTCP@test',
//            'Shahboztv@test',
//            'Nurtv@test',
//            'Jiztv@test',
//            'Zaminfm@test',
//            'Jizfm@test',
//            'Kamolotfm@test',
//            'qashqadaryotelekom@umail.uz',
//            'isttelekom@umail.uz',
//            'turon@umail.uz',
//            'qashqadaryortum@umail.uz',
//            'Dildora-f@umail.uz',
//            'umsqarshi@umail.uz',
//            'unitelqarshi@umail.uz',
//            'coscomqarshi@umail.uz',
//            'uzmobaylqarshi@umail.uz',
//            'perfektumqarshi@umail.uz',
//            'Navoi_test@ucell.uz',
//            'Navoi_test@beeline.uz',
//            'Navoi_test@ums.uz',
//            'Navoi_test@uzmobile.uz',
//            'Navoi_test@east-telecom.uz',
//            'Navoi_test@telecom.uz',
//            'Navoi_test@evo.uz',
//            'Navoi_test@rtum.uz',
//            'Navoi_test@rikom.uz',
//            'Navoi_test@bexruz.uz',
//            'nam_tel_test',
//            'nam_isttel_test',
//            'nam_shak_test',
//            'nam_rtum_test',
//            'nam_ktv_test',
//            'nam_city_test',
//            'nam_uzon_test',
//            'nam_ucel_test',
//            'nam_unitel_test',
//            'nam_uzmob_test',
//            'Samtelecom@test',
//            'SamTTT-4@test',
//            'Samarsin@test',
//            'Samums@test',
//            'Samtps@test',
//            'Samafrosiyo@test',
//            'SamRtum@test',
//            'Sambeeline@test',
//            'Samsimus@test',
//            'Samcoscom@test',
//            'test@sirtel.uz',
//            'test@sircom.uz',
//            'test@sity-1.uz',
//            'test@ist.uz',
//            'test@best.uz',
//            'test@soft.uz',
//            'test@turon.uz',
//            'test@tele.uz',
//            'test@sirTRK.uz',
//            'test@ucell.uz',
//            'test@uzmobile.uz',
//            'test@beeline.uz',
//            'testunitel@gis.uz',
//            'testsimus@gis.uz',
//            'testruxsor@gis.uz',
//            'testftelecom@gis.uz',
//            'testFVKTV@gis.uz',
//            'testcoscom@gis.uz',
//            'testcomnet@gis.uz',
//            'testmuloqot@gis.uz',
//            'testist-telecom@gis.uz',
//            'testrah-shax@gis.uz',
//            'delid@umail.uz',
//            'pertec@umail.uz',
//            'kabel@umail.uz',
//            'zaza@umail.uz',
//            'hayattelecom@umail.uz',
//            'pitnaktv@umail.uz',
//            'gurlaninternet@umail.uz',
//            'jayhunmobil@umail.uz',
//            'gurlantv@umail.uz',
//            'shovotradio@umail.uz',
//            'yangibozor@umail.uz',
//            'honqamobil@umail.uz',
//            'shovotaloqa@umail.uz',
//            'yantelecom@umail.uz',
//            'omonaloqa@umail.uz',
//            'urganchinternet@umail.uz',
//            'honqamobil@umail.uz',
//            'tashkent.region@gis.uz',
//            'tashkent1@gis.uz',
//            'tashkent@gis.uz',
//            'test@gis.uz',
//            'uzmobile@gis.uz',
//            'coscom@gis.uz',
//            'unitel@gis.uz',
//            'mobi@gis.uz',
//            'perfectum@gis.uz',
//
//            'javohirjuraev1992@gmail.com',
//            'max@max123.com',
//            'test@user123.com',
//            'test121@test.com',

            /* left test users*/
//            'sardor_bahromov@mail.ru',
//            'test1@gis.uz',
//            'sardor_bahromov@mail.ru',
//            'test2@gis.uz',
//            'samarkand@gis.uz',

            'huhyg@mailinator.com',
            'test@gis.uz',
            'javohirjuraev1992@gmail.com',
            'pewufy@mailinator.com',


        ])->get();

        foreach ($usersToBeDeleted as $user) {
            $applications = Application::withTrashed()->where('owner_id', $user->id)->get();
//            dd('app');
//            dd($applications);
            if ($applications) {
                foreach ($applications as $application) {
                    $direction = Direction::where('id', $application->direction_id)->first();
                    if ($direction->code == 't') {
                        $objects = TObject::where('application_id', $application->id)->get();
                        if ($objects) {
                            foreach ($objects as $object) {
                                $endpoints = Endpoint::withTrashed()->where('t_object_id', $object->id)->get();
                                $inspections = Inspection::withTrashed()->where('t_object_id', $object->id)->get();
                                $documents = Document::where('t_object_id', $object->id)->get();
                                if ($endpoints) {
                                    foreach ($endpoints as $endpoint) {
                                        $endpoint->forceDelete();
                                    }
                                }
                                if ($inspections) {
                                    foreach ($inspections as $inspection) {
                                        if ($inspection->deleted_at == null) {
                                            $inspection->delete();
                                        }
                                        $inspection->forceDelete();
                                    }
                                }
                                if ($documents) {
                                    foreach ($documents as $document) {
                                        if ($document->deleted_at == null) {
                                            $document->delete();
                                        }
                                        $document->forceDelete();
                                    }
                                }

                                if ($object->deleted_at == null) {
                                    $object->delete();
                                }
                                $object->forceDelete();
                            }
                        }
                    } elseif ($direction->code == 's') {
//                        $Sobjects = SObject::where('application_id', 640)->first();
//                        dd($Sobjects);
                        $objects = SObject::where('application_id', $application->id)->get();
//                        dd($objects);
                        if ($objects) {
                            foreach ($objects as $object) {
                                $endpoints = Endpoint::withTrashed()->where('s_object_id', $object->id)->get();
                                $inspections = Inspection::withTrashed()->where('s_object_id', $object->id)->get();
                                $documents = Document::where('s_object_id', $object->id)->get();

                                if ($endpoints) {
                                    foreach ($endpoints as $endpoint) {
//                                        dd($endpoint);
                                        $endpoint->forceDelete();
                                    }
                                }
                                if ($inspections) {
                                    foreach ($inspections as $inspection) {
                                        if ($inspection->deleted_at == null) {
                                            $inspection->delete();
                                        }
                                        $inspection->forceDelete();
                                    }
                                }
                                if ($documents) {
                                    foreach ($documents as $document) {
                                        if ($document->deleted_at == null) {
                                            $document->delete();
                                        }
                                        $document->forceDelete();
                                    }
                                }

                                if ($object->deleted_at == null) {
                                    $object->delete();
                                }
                                $object->forceDelete();
                            }
                        }
                    } elseif ($direction->code == 'r') {
                        $objects = RObject::where('application_id', $application->id)->get();
                        if ($objects) {
                            foreach ($objects as $object) {
                                $endpoints = Endpoint::withTrashed()->where('r_object_id', $object->id)->get();
                                $inspections = Inspection::withTrashed()->where('r_object_id', $object->id)->get();
                                $documents = Document::where('r_object_id', $object->id)->get();

                                if ($endpoints) {
                                    foreach ($endpoints as $endpoint) {
                                        $endpoint->forceDelete();
                                    }
                                }
                                if ($inspections) {
                                    foreach ($inspections as $inspection) {
                                        if ($inspection->deleted_at == null) {
                                            $inspection->delete();
                                        }
                                        $inspection->forceDelete();
                                    }
                                }
                                if ($documents) {
                                    foreach ($documents as $document) {
                                        if ($document->deleted_at == null) {
                                            $document->delete();
                                        }
                                        $document->forceDelete();
                                    }
                                }

                                if ($object->deleted_at == null) {
                                    $object->delete();
                                }
                                $object->forceDelete();
                            }
                        }
                    } else {
//                        $testObjects = MObject::where('application_id', $application->id)->where('deleted_at', '!=', null)->get();
//                        dd($testObjects);
                        $objects = MObject::where('application_id', $application->id)->get();
                        if ($objects) {
                            foreach ($objects as $object) {
                                $endpoints = Endpoint::withTrashed()->where('m_object_id', $object->id)->get();
                                $inspections = Inspection::withTrashed()->where('m_object_id', $object->id)->get();
                                $documents = Document::where('m_object_id', $object->id)->get();

                                if ($endpoints) {
                                    foreach ($endpoints as $endpoint) {
                                        $endpoint->forceDelete();
                                    }
                                }
                                if ($inspections) {
                                    foreach ($inspections as $inspection) {
                                        if ($inspection->deleted_at == null) {
                                            $inspection->delete();
                                        }
                                        $inspection->forceDelete();
                                    }
                                }
                                if ($documents) {
                                    foreach ($documents as $document) {
                                        if ($document->deleted_at == null) {
                                            $document->delete();
                                        }
                                        $document->forceDelete();
                                    }
                                }

                                if ($object->deleted_at == null) {
                                    $object->delete();
                                }
                                $object->forceDelete();
                            }
                        }
                    }

                }
            }
        }

        foreach ($usersToBeDeleted as $user) {
//            dd('salam');
            $applications = Application::withTrashed()->where('owner_id', $user->id)->get();
//            dd($applications);
            if ($applications) {
                foreach ($applications as $application) {
                    $tObjects = TObject::where('application_id', $application->id)->get();
                    $sObjects = SObject::where('application_id', $application->id)->get();
                    $rObjects = RObject::where('application_id', $application->id)->get();
                    $mObjects = MObject::where('application_id', $application->id)->get();
//                    dd($tObjects, $sObjects, $rObjects, $mObjects);

                    if ($tObjects) {
                        foreach ($tObjects as $tObject) {
                            if ($tObject->deleted_at == null) {
                                $tObject->delete();
                            }
                            $tObject->forceDelete();
                        }
                    }
                    if ($sObjects) {
                        foreach ($sObjects as $sObject) {
                            if ($sObject->deleted_at == null) {
                                $sObject->delete();
                            }
                            $sObject->forceDelete();
                        }
                    }
                    if ($rObjects) {
                        foreach ($rObjects as $rObject) {
                            if ($rObject->deleted_at == null) {
                                $rObject->delete();
                            }
                            $rObject->forceDelete();
                        }
                    }
                    if ($mObjects) {
                        foreach ($mObjects as $mObject) {
                            if ($mObject->deleted_at == null) {
                                $mObject->delete();
                            }
                            $mObject->forceDelete();
                        }
                    }

                    if ($application->deleted_at == null) {
                        $application->delete();
                    }
//                    dd('stopping here | object_id reference');
                    $application->forceDelete();
                }
            }
//            $documents = Document::where('user_id', $user->id)->get();
////            dd($documents);
//            if ($documents) {
//                foreach ($documents as $document) {
//                    if ($document->deleted_at == null) {
//                        $document->delete();
//                    }
//                    $document->forceDelete();
//                }
//            }
//            dd($documents);
            if ($user->deleted_at == null) {
                $user->delete();
            }
            $user->forceDelete();
        }

        return 'users deleted successfully, inshaallah';

    }

    /**
     * deletes application, object, endpoint
     */
    public function delete_test_things()
    {
        /**
         * delete applications , with id
         * 666,667
         */
//        $applications = Application::whereIn('id', [666,667])->get();
        $applications = Application::all();
        if ($applications){
            foreach ($applications as $application){
                if ($application->direction_id == 1){
                    $objects = TObject::where('application_id', $application->id)->get();
                    if ($objects){
                        foreach ($objects as $object){
                            $endpoints = Endpoint::withTrashed()->where('t_object_id', $object->id)->get();
                            $inspections = Inspection::withTrashed()->where('t_object_id', $object->id)->get();
                            $documents = Document::where('t_object_id', $object->id)->get();
                            if ($endpoints){
                                foreach ($endpoints as $endpoint){
                                    if ($endpoint->deleted_at == null){
                                        $endpoint->delete();
                                    }
                                    $endpoint->forceDelete();
                                }
                            }
                            if ($inspections) {
                                foreach ($inspections as $inspection) {
                                    if ($inspection->deleted_at == null) {
                                        $inspection->delete();
                                    }
                                    $inspection->forceDelete();
                                }
                            }
                            if ($documents) {
                                foreach ($documents as $document) {
                                    if ($document->deleted_at == null) {
                                        $document->delete();
                                    }
                                    $document->forceDelete();
                                }
                            }
                            if ($object->deletd_at == null){
                                $object->delete();
                            }
                            $object->forceDelete();
                        }
                    }
//                    dd($objects);
                } elseif ($application->direction_id == 2){
                    $objects = SObject::where('application_id', $application->id)->get();
                    if ($objects){
                        foreach ($objects as $object){
                            $endpoints = Endpoint::withTrashed()->where('s_object_id', $object->id)->get();
                            $inspections = Inspection::withTrashed()->where('s_object_id', $object->id)->get();
                            $documents = Document::where('s_object_id', $object->id)->get();
                            if ($endpoints){
                                foreach ($endpoints as $endpoint){
                                    if ($endpoint->deleted_at == null){
                                        $endpoint->delete();
                                    }
                                    $endpoint->forceDelete();
                                }
                            }
                            if ($inspections) {
                                foreach ($inspections as $inspection) {
                                    if ($inspection->deleted_at == null) {
                                        $inspection->delete();
                                    }
                                    $inspection->forceDelete();
                                }
                            }
                            if ($documents) {
                                foreach ($documents as $document) {
                                    if ($document->deleted_at == null) {
                                        $document->delete();
                                    }
                                    $document->forceDelete();
                                }
                            }
                            if ($object->deletd_at == null){
                                $object->delete();
                            }
                            $object->forceDelete();
                        }
                    }
//                    dd(2);
//                    dd($objects);
                } elseif ($application->direction_id == 3){
                    $objects = RObject::where('application_id', $application->id)->get();
                    if ($objects){
                        foreach ($objects as $object){
                            $endpoints = Endpoint::withTrashed()->where('r_object_id', $object->id)->get();
                            $inspections = Inspection::withTrashed()->where('r_object_id', $object->id)->get();
                            $documents = Document::where('r_object_id', $object->id)->get();
                            if ($endpoints){
                                foreach ($endpoints as $endpoint){
                                    if ($endpoint->deleted_at == null){
                                        $endpoint->delete();
                                    }
                                    $endpoint->forceDelete();
                                }
                            }
                            if ($inspections) {
                                foreach ($inspections as $inspection) {
                                    if ($inspection->deleted_at == null) {
                                        $inspection->delete();
                                    }
                                    $inspection->forceDelete();
                                }
                            }
                            if ($documents) {
                                foreach ($documents as $document) {
                                    if ($document->deleted_at == null) {
                                        $document->delete();
                                    }
                                    $document->forceDelete();
                                }
                            }
                            if ($object->deletd_at == null){
                                $object->delete();
                            }
                            $object->forceDelete();
                        }
                    }
                } else {
                    $objects = MObject::where('application_id', $application->id)->get();
                    if ($objects){
                        foreach ($objects as $object){
                            $endpoints = Endpoint::withTrashed()->where('m_object_id', $object->id)->get();
                            $inspections = Inspection::withTrashed()->where('m_object_id', $object->id)->get();
                            $documents = Document::where('m_object_id', $object->id)->get();
                            if ($endpoints){
                                foreach ($endpoints as $endpoint){
                                    if ($endpoint->deleted_at == null){
                                        $endpoint->delete();
                                    }
                                    $endpoint->forceDelete();
                                }
                            }
                            if ($inspections) {
                                foreach ($inspections as $inspection) {
                                    if ($inspection->deleted_at == null) {
                                        $inspection->delete();
                                    }
                                    $inspection->forceDelete();
                                }
                            }
                            if ($documents) {
                                foreach ($documents as $document) {
                                    if ($document->deleted_at == null) {
                                        $document->delete();
                                    }
                                    $document->forceDelete();
                                }
                            }
                            if ($object->deletd_at == null){
                                $object->delete();
                            }
                            $object->forceDelete();
                        }
                    }
                }

             if ($application->deleted_at == null){
                 $application->delete();
             }

            $application->forceDelete();

            }
        }



        return '5 applications are inshaallah deleted';
    }

    public function delete_object_types()
    {
//        $montajSigimi = DObjectType::where('code', 'coaxcab')->first();
//        $montajSigimi->endpoint_fields = '{"ts_cable_length":"","ts_assembly_value":"","ts_cable_vols":""}';
//        $montajSigimi->save();

//        $direction = Direction::where('code', 'm')->first();
//        $direction->name_uz = 'Mobil va radioaloqa';
//        $direction->name_ru = 'Мобильное и радиосвязь';
//        $direction->save();

//        $endpoints = Endpoint::whereIn('object_type_id', [8,9,23])->get();
//        foreach ($endpoints as $endpoint)
//            $endpoint->delete();
//
//        $objectTypes = DObjectType::whereIn('code', ['volsdevices','actdevices','trrl'])->get();
//        foreach ($objectTypes as $objectType)
//            $objectType->delete();


//        $multi = DObjectType::where('code', 'msan')->first();
//        $multi->endpoint_fields = '{"ts_cable_length_":"","ts_assembly_value":"_msan","ts_cable_length":"_msan"}';
//        $multi->save();
//
//
//        $SalamobjectTypes = DObjectType::whereIn('code', ['svols', 'rrl'])->get();
//        foreach ($SalamobjectTypes as $SalamobjectType){
//            $SalamobjectType->name_uz = $SalamobjectType->name_uz . '.';
//            $SalamobjectType->name_ru = $SalamobjectType->name_ru . '.';
//            $SalamobjectType->save();
//        }

        return 'success!, inshaallah';

    }

    public function create_deleted_uzkom_users()
    {

        $user = User::create([
            'company_name' => 'Мирзаев Ш.',
            'email'=> 'sh.mirzaev@gis.uz',
            'director_fio' => 'Турғунов Комолидин Абзалович',
            'photo' => 'storage/userphotos/sh.mirzaev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('obxn6PbXrV',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','t')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());


        $user = User::create([
            'company_name' => 'Рахматуллаев Ш.',
            'email'=> 'sh.raxmatullaev@gis.uz',
            'director_fio' => 'Исламов Жамшид Нигматжанович',
            'photo' => 'storage/userphotos/sh.raxmatullaev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('L7Na9UurH2',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','s')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());

        $user = User::create([
            'company_name' => 'Махмудов У.',
            'email'=> 'u.maxmudov@gis.uz',
            'director_fio' => 'Тигай Павел Александрович',
            'photo' => 'storage/userphotos/u.maxmudov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('HuDBJXNeH6',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','r')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());
        $user = User::create([
            'company_name' => 'Нажмиддинов Б.',
            'email'=> 'b.najmiddinov@gis.uz',
            'director_fio' => 'Тигай Павел Александрович',
            'photo' => 'storage/userphotos/b.najmiddinov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('UtPoT0L3iY',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','r')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());

        $user = User::create([
            'company_name' => 'Otabekov O.',
            'email'=> 'o.otabekov@gis.uz',
            'director_fio' => 'Мамарасулов Музаффар Рустамович',
            'photo' => 'storage/userphotos/o.otabekov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('FmGzTZ5r5C',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','m')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());

        $user = User::create([
            'company_name' => 'Хамдамов З.',
            'email'=> 'z.xamdamov@gis.uz',
            'director_fio' => 'Мамарасулов Музаффар Рустамович',
            'photo' => 'storage/userphotos/z.xamdamov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('ArpMvtT9J8',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','m')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());


    }

    public function create_zam_user()
    {
        $user = User::create([
            'company_name' => 'Заместитель начальника',
            'email'=> 'zam@qabul',
            'photo' => 'storage/app/photos/u249/86Lb1YaXkIfVniBlFcpZYMYTicTUeKIaayDsKr21.jpg',
            'director_fio' => 'Маткаримов Абдусаттар Абдумаликович',
            'inn' => '911111111',
            'is_director' => true,
            'password' => Hash::make('QabulZamPassword',['rounds'=>10])
        ]);
        $user->assignRole(Role::where('code','ukn')->first());
    }
}
