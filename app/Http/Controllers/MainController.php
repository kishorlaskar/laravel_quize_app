<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
        public  function  startquize()
        {
               Session::put('nextq',1);
               Session::put('wrongans',0);
               Session::put('correctans',0);

               $q= Question::all()->first();
               return view('answer')->with(['question'=>$q]);

        }
        public function submitans(Request $request)
        {
            $nextq = Session::get('nextq');
            $wrongans = Session::get('wrongans');
            $correctans = Session::get('correctans');
            $request->validate([
              'question'=> 'required',
              'dbans' => 'required',
          ]);


          $nextq+=1;
          if ($request->dbans == $request->ans)
          {
              $correctans+=1;
          }
          else
              {
                  $wrongans+=1;
              }
          Session::put("nextq",$nextq);
          Session::put("wrongans",$wrongans);
          Session::put("correctans",$correctans);

           $i=0;

           $question = Question::all();

           foreach ($question as $question)
           {
               $i++;
               if($question->count() < $nextq)
               {
                   return view('end');
               }
               if ($i==$nextq)
               {
                   return view('answer')->with(['question'=>$question]);
               }
           }

        }
}
