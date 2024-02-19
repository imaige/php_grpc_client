Php grpc install
1. Install php
2. Install grpc package - git clone --recurse-submodules -b v1.43.0 https://github.com/grpc/grpc
3. cd grpc
4. Use that to prep grpc for php - see https://github.com/grpc/grpc.io/pull/684 (requires make & cmake)
5. build grpc for php (pecl install grpc, sudo if need)
6. Install protobuf, which includes protoc (brew install protobuf or similar) 

Additional requirements
- Protoc command: protoc --php_out=./proto_models --grpc_out=./proto_models --plugin=protoc-gen-grpc=./grpc/cmake/build/grpc_php_plugin internal_api_template_service.proto
- Must add require namespace of GPBMetadata/$ServiceClass in request file *after* running protoc command
