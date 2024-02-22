import subprocess
import sys
import photo_letariat_php as photo_letariat


def generate_protos_and_replace_import(proto_directory, files_out_location, proto_file, grpc_php_plugin_path) -> None:
    # enforcement that protocol buffer generation will happen successfully
    # proto_file must end with .proto
    assert (proto_file[-6:]) == '.proto', "The provided proto_file must be of file type .proto"

    # proto_file must be contained within proto_directory
    proto_dir_path = files_out_location.split('/')
    proto_file_path = proto_file.split('/')

    # requiring files_out_location to be the end location for all files (_pb2.py, _pb2.pyi, and _pb2_grpc.py) ensures
    # import statements between said files are standard & in turn, that photo_letariat generates correct imports
    command1 = [
        "protoc",
        f"-I={proto_directory}",
        f"--plugin=protoc-gen-grpc={grpc_php_plugin_path}",
        f"--php_out={files_out_location}",
        f"--grpc_out={files_out_location}",
        proto_file
    ]

    print("command1 is going to be:")
    print(command1)

    subprocess.run(command1)

    request_file_name = photo_letariat.find_rpc_method(files_out_location, proto_file)
    proto_buffer_file_name = photo_letariat.get_protocol_buffer_file_name_pascal_php(proto_file)
    proto_buffer_file_path = f"{files_out_location}/GPBMetadata/{proto_buffer_file_name}.php"

    print("running replace_pb2_import_statement_php with params: ")
    print(f"request_file_name: {request_file_name}")
    print(f"proto_buffer_file_path: {proto_buffer_file_path}")
    photo_letariat.replace_pb2_import_statement_php(request_file_name, proto_buffer_file_path)


if __name__ == "__main__":
    if len(sys.argv) != 5:
        print("Usage: python generate_protos.py <proto_directory> <files_out_location> <proto_file> <grpc_php_plugin_path>")
        sys.exit(1)

    proto_directory_arg = sys.argv[1]
    files_out_arg = sys.argv[2]
    proto_file_arg = sys.argv[3]
    grpc_php_plugin_path = sys.argv[4]

    generate_protos_and_replace_import(proto_directory_arg, files_out_arg, proto_file_arg, grpc_php_plugin_path)
