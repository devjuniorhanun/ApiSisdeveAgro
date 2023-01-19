import 'package:flutter/material.dart';
import 'package:get/get.dart';

/// Mixin LoaderMixin
/// Responsavel por geral um loader na apricação
mixin LoaderMixin on GetxController {
  void loaderListener(RxBool loading) {
    ever(loading, (_) async {
      /// Fica observando as auterações no loading da aplicação
      if (loading.isTrue) {
        await Get.dialog(
          WillPopScope(
            // Bloquea a tela ate finalizar o loading
            onWillPop: () async => false,
            child: const Center(
              child: CircularProgressIndicator(),
            ),
          ),
          barrierDismissible: false,
        );
      } else {
        Get.back();
      }
    });
  }
}
