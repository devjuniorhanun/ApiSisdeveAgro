import 'package:get/get.dart';

import '../../infra/rest_client/rest_client.dart';

/// Binding de inicialização
/// Responsavel por inciializar RestClient() em todoa a aplicação

class ApplicationBinding implements Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => RestClient(),
      fenix: true,
    );
  }
}
