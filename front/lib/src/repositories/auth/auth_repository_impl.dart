import 'dart:developer';
import '../../infra/rest_client/rest_client.dart';
import '../../core/exceptions/user_notfound_exception.dart';
import '../../models/auth/user_model.dart';
import './auth_repository.dart';

class AuthRepositoryImpl implements AuthRepository {
  final RestClient _restClient;

  // Criando uma conexão com a api
  AuthRepositoryImpl({
    required RestClient restClient,
  }) : _restClient = restClient;

  @override
  Future<UserModel> login(String email, String password) async {
    final result = await _restClient.post(
      'auth/login',
      {
        'email': email,
        'password': password,
      },
    );

    // Veririfica se gerou algum erro
    if (result.hasError) {
      if (result.statusCode == 403) {
        log('usuario ou senha inválidos',
            error: result.statusText, stackTrace: StackTrace.current);
        throw UserNotFoundException();
      }

      log(
        'Erro ao autenticar o usuário (${result.statusCode})',
        error: result.statusText,
        stackTrace: StackTrace.current,
      );
      throw RestClientException('Erro ao autenticar usuário');
    }

    return UserModel.fromMap(result.body); // Mostra as informações do usuário
  }
}
