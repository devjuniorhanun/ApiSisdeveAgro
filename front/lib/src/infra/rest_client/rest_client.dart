import 'package:get/get_connect.dart';

class RestClient extends GetConnect {
  final _backendBaseUrl = 'http://127.0.0.1:8000';

  RestClient() {
    httpClient.baseUrl = _backendBaseUrl;
  }
}

class RestClientException implements Exception {
  final int? code;
  final String message;

  RestClientException(
    this.message, {
    this.code,
  });

  @override
  String toString() => 'RestClientException(code: $code, message: $message)';
}
