<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Word;
use App\Http\Requests\WordStore;
use App\Http\DTO\Input\WordStoreInputData;
use App\Http\DTO\Input\WordUpdateInputData;
use App\Http\DTO\Input\WordDeleteInputData;
use App\Http\DTO\Input\WordFavoInputData;
use App\Http\UseCases\Interactors\WordInteractor;

class WordsController extends Controller
{
    public function store(Request $request) {
        $currentUserId = $request->userId;
        $inputData = new WordStoreInputData($currentUserId, $request->English, $request->Japanese);
        $wordInteractor = new WordInteractor();
        $wordInteractor->setValues($inputData);
        return response()->json(['response' => 'OK']);
    }

    public function update(Request $request) {
        $currentUserId = $request->userId;
        $wordId = $request->wordId;
        $inputData = new WordUpdateInputData($currentUserId, $wordId, $request->English, $request->Japanese);
        $wordInteractor = new WordInteractor();
        $wordInteractor->updateValues($inputData);
        return response()->json(['response' => 'OK']);
    }

    public function destroy(Request $request) {
        $currentUserId = $request->userId;
        $wordId = $request->wordId;
        $inputData = new WordDeleteInputData($currentUserId, $wordId);
        $wordInteractor = new WordInteractor();
        $outputData = $wordInteractor->deleteValues($inputData);

        //validation result
        if ($outputData->getError()) {
            return response()->json(['error_message' => $outputData->getError()->getMessage()]);
        }
        return response()->json(['word_id' => $wordId]);
    }

    public function test(Request $request) {
        $currentUserId = $request->currentUserId;
        $wordInteractor = new WordInteractor();
        $outputData = $wordInteractor->getRandWord($currentUserId);

        //validation result
        if ($outputData->getError()) {
            return response()->json(['error_message' => $outputData->getError()->getMessage()]);
        }
        return response()->json(['word' => ['Japanese' => $outputData->getJapanese(), 'English' => $outputData->getEnglish()]]);
    }


    public function index(Request $request) {
        $currentUserId = $request->currentUserId;
        $wordInteractor = new WordInteractor();
        $outputData = $wordInteractor->getOtherWord($currentUserId);
        $words = $outputData->getOtherWords();
        return response()->json(['words' => $words]);
    }

    public function like(Request $request) {
        $currentUserId = $request->currentUserId;
        $inputData = new WordFavoInputData($currentUserId, $request->type, $request->wordId);
        $wordInteractor = new WordInteractor();
        $wordInteractor->favoWord($inputData);
    }
}
