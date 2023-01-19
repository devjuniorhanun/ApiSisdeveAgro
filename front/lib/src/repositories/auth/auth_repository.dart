import '../../models/auth/user_model.dart';

abstract class AuthRepository {
  Future<UserModel> login(String email, String password);
}
