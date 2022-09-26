/* It verifies if the token is valid, updates the password, removes the verification data from the
database, and returns a response */
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ChangePasswordController extends Controller
{
/**
 * If the updatePasswordRow function returns a count greater than 0, then reset the password.
 * Otherwise, return the tokenNotFoundError.
 *
 * @param UpdatePasswordRequest request The request object
 *
 * @return The return value is a boolean value.
 */
    public function passwordResetProcess(UpdatePasswordRequest $request){
        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) : $this->tokenNotFoundError();
      }

/**
 * It returns a query builder object that will be used to update the password_resets table
 *
 * @param request The request object
 *
 * @return The query builder object.
 */
      // Verify if token is valid
      private function updatePasswordRow($request){
         return DB::table('password_resets')->where([
             'email' => $request->email,
             'token' => $request->resetToken
         ]);
      }

/**
 * If the token is not found, return a response with an error message
 *
 * @return A JSON response with a 422 status code and a message.
 */
      // Token not found response
      private function tokenNotFoundError() {
          return response()->json([
            'error' => 'Either your email or token is wrong.'
          ],Response::HTTP_UNPROCESSABLE_ENTITY);
      }

      // Reset password
/**
 * It finds the user's email, updates the password, removes the verification data from the database,
 * and returns a response
 *
 * @param request The request object.
 *
 * @return A JSON response with a message that the password has been updated.
 */
      private function resetPassword($request) {
          // find email
          $userData = User::whereEmail($request->email)->first();
          // update password
          $userData->update([
            'password'=>bcrypt($request->password)
          ]);
          // remove verification data from db
          $this->updatePasswordRow($request)->delete();

          // reset password response
          return response()->json([
            'data'=>'Password has been updated.'
          ],Response::HTTP_CREATED);
      }
}
